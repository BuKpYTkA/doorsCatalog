<?php

namespace App\Providers;

use App\Repository\MainProductRepository\MainProductRepository;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvier extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MainProductRepositoryInterface::class, MainProductRepository::class);
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
