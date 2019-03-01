<?php

namespace App\Providers;

use App\Services\FilterCondition\FilterConditionService;
use App\Services\FilterCondition\FilterConditionServiceInterface;
use App\Services\SortCondition\SortConditionService;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Support\ServiceProvider;

class OutputServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SortConditionServiceInterface::class, SortConditionService::class);
        $this->app->singleton(FilterConditionServiceInterface::class, FilterConditionService::class);
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
