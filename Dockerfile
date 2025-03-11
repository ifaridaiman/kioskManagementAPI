############################################
# Stage 1: Node.js Build Stage
############################################
# FROM node:lts AS node-builder

# # Set working directory
# WORKDIR /app

# # Copy only package.json and package-lock.json to leverage Docker caching
# COPY package*.json ./

# # Install dependencies
# RUN npm ci --no-cache

# # Copy the rest of the app and build assets
# COPY . .
# RUN npm run build

# # Remove node_modules to avoid unnecessary files in the next stage
# RUN rm -rf /app/node_modules /root/.npm

############################################
# Base Image
############################################
FROM serversideup/php:8.4-fpm-nginx-alpine AS base

############################################
# Development Image
############################################
FROM base AS development

# Switch to root so we can do root things
USER root

# Save the build arguments as a variable
ARG USER_ID
ARG GROUP_ID

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Drop back to our unprivileged user
USER www-data

############################################
# Production Image
############################################

# Since we're calling "base", production isn't
# calling any of that permission stuff
FROM base AS production

USER root

RUN apk add --no-cache ca-certificates && \
    apk update && apk upgrade && \
    install-php-extensions gd intl redis

# RUN apk update && apk upgrade && install-php-extensions gd intl redis
# RUN apk add --no-cache ca-certificates nano

USER www-data

# Copy our app files as www-data (33:33)
COPY --chown=www-data:www-data . /var/www/html
COPY cacert.pem /home/www-data/
COPY my-custom-php.ini /usr/local/etc/php/conf.d/

# Copy built assets from the Node.js build stage
# COPY --from=node-builder /app/public /var/www/html/public

# Install production dependencies using Composer
RUN composer install --no-dev --no-interaction --optimize-autoloader && \
    composer clear-cache

# RUN composer install --no-dev --no-interaction --optimize-autoloader \
#     && composer clear-cache \
#     && npm ci --no-cache \
#     && npm run build
