<?php

namespace App\Providers;

use App\Services\CrudHelperService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        $this->app->bind(CrudHelperService::class, function ($app, $params) {
            return new CrudHelperService($params['model']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
