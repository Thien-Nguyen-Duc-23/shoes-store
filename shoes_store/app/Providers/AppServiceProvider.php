<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Client\ViewComposers\HeaderComposer;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryEloquentRepository;

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
