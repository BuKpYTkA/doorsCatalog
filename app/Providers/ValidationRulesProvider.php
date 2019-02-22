<?php

namespace App\Providers;

use App\Services\ValidationRules\ValidationRulesService;
use App\Services\ValidationRules\ValidationRulesServiceInterface;
use Illuminate\Support\ServiceProvider;

class ValidationRulesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ValidationRulesServiceInterface::class, ValidationRulesService::class);
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
