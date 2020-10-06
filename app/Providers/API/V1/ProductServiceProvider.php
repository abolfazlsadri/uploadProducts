<?php

namespace App\Providers\API\V1;

use Illuminate\Support\ServiceProvider;
use App\Services\API\V1\Interfaces\ProductInterface;
use App\Services\API\V1\Services\Product\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductInterface::class, ProductService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
