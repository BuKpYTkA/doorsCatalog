<?php

namespace App\Providers;

use App\Factory\AdditionalProductFactory\AdditionalProductFactory;
use App\Factory\AdditionalProductFactory\AdditionalProductFactoryInterface;
use App\Factory\ImageFactory\ImageFactory;
use App\Factory\ImageFactory\ImageFactoryInterface;
use App\Factory\MainProductFactory\MainProductFactory;
use App\Factory\MainProductFactory\MainProductFactoryInterface;
use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MainProductFactoryInterface::class, MainProductFactory::class);
        $this->app->singleton(AdditionalProductFactoryInterface::class, AdditionalProductFactory::class);
        $this->app->singleton(ImageFactoryInterface::class, ImageFactory::class);
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
