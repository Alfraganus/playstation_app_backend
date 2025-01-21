<?php
namespace App\Services;

use Illuminate\Support\Facades\Route;

class RouteRegistrarService
{
    public static function registerCrudRoutes(string $controller, string $prefix, string $name = null)
    {
        $name = $name ?? $prefix;
      return  Route::prefix($prefix)->name("$name.")->group(function () use ($controller) {
            Route::get('/', [$controller, 'index'])->name('index');
            Route::get('{id}', [$controller, 'show'])->name('show');
            Route::post('/', [$controller, 'store'])->name('store');
            Route::put('{id}', [$controller, 'update'])->name('update');
            Route::delete('{id}', [$controller, 'destroy'])->name('destroy');
        });
    }
}
