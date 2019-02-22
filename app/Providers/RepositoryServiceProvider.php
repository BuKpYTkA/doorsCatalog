<?php

namespace App\Providers;

use App\Entity\Image\Image;
use App\Repository\AdditionalProductRepository\AdditionalProductRepository;
use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Repository\ImageRepository\ImageRepository;
use App\Repository\ImageRepository\ImageRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepository;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MainProductRepositoryInterface::class, MainProductRepository::class);
        $this->app->singleton(AdditionalProductRepositoryInterface::class, AdditionalProductRepository::class);
        $this->app->singleton(ImageRepositoryInterface::class, ImageRepository::class);
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
