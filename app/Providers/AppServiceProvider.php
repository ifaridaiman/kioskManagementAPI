<?php

namespace App\Providers;

use App\Interfaces\Menu\MenuCategoryInterface;
use App\Interfaces\Menu\MenuInterface;
use App\Interfaces\Order\OrderInterface;
use App\Interfaces\PaymentInterface;
use App\Repositories\Menu\MenuRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Order\OrderTypeInterface;
use App\Interfaces\Order\OrderTypeRuleInterface;
use App\Repositories\Order\OrderTypeRepository;
use App\Interfaces\PaymentGateway\BillPlz\CollectionInterface;
use App\Repositories\Menu\MenuCategoryRepository;
use App\Repositories\Order\OrderTypeRuleRepository;
use App\Repositories\PaymentGateway\BillPlz\CollectionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CollectionInterface::class, CollectionRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);

        //Menu
        $this->app->bind(MenuCategoryInterface::class, MenuCategoryRepository::class);
        $this->app->bind(MenuInterface::class, MenuRepository::class);

        //Order
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(OrderTypeInterface::class, OrderTypeRepository::class);
        $this->app->bind(OrderTypeRuleInterface::class, OrderTypeRuleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
