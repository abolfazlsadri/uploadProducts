<?php

namespace App\Providers\API\V1;

use Illuminate\Support\ServiceProvider;
use App\Services\API\V1\Interfaces\FileInterface;
use App\Services\API\V1\Services\File\FileService;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileInterface::class, FileService::class);

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
