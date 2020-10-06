<?php

namespace App\Providers\API\V1;

use Illuminate\Support\ServiceProvider;
use App\Services\API\V1\Interfaces\UserInterface;
use App\Services\API\V1\Services\User\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserService::class);
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
