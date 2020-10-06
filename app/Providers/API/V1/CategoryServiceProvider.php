<?php

namespace App\Providers\API\V1;

use Illuminate\Support\ServiceProvider;
use App\Services\API\V1\Interfaces\CategoryInterface;
use App\Services\API\V1\Services\Category\CategoryService;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryService::class);
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
