<?php

namespace App\Providers;

use App\Interfaces\PaymentGateway\BillPlz\CollectionInterface;
use App\Interfaces\PaymentInterface;
use App\Repositories\PaymentGateway\BillPlz\CollectionRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CollectionInterface::class, CollectionRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
