<?php

namespace Lianpark\Product;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 페이징네이션
        Paginator::useBootstrapFive();

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'product');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
