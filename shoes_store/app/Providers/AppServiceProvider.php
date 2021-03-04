<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Client\ViewComposers\HeaderComposer;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryEloquentRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Customer\CustomerEloquentRepository;
use App\Repositories\News\NewsEloquentRepository;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Product\ProductEloquentRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Order\OrderEloquentRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailEloquentRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );

        $this->app->singleton(
            CustomerRepositoryInterface::class,
            CustomerEloquentRepository::class
        );

        $this->app->singleton(
            NewsRepositoryInterface::class,
            NewsEloquentRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductEloquentRepository::class
        );
        
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderEloquentRepository::class
        );
        
        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share View
        view()->composer(
            'client.partials.header.header_pc',
            HeaderComposer::class
        );

        view()->composer(
            'client.partials.footer',
            HeaderComposer::class
        );

        Builder::defaultStringLength(191);
        Schema::defaultStringLength(191);
    }
}
