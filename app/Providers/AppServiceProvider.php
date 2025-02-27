<?php

namespace App\Providers;

use App\Interfaces\PaymentGateway\BillPlz\CollectionInterface;
use App\Repositories\PaymentGateway\BillPlz\CollectionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CollectionInterface::class, CollectionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
