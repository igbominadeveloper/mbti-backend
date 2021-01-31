<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ResponseInterface;
use App\Services\ResponseService;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseInterface::class, ResponseService::class);
    }
}
