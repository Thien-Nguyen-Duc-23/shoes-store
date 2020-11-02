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
