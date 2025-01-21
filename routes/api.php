<?php

use App\Http\Controllers\RoomController;
use App\Services\RouteRegistrarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/login', [AuthController::class, 'signIn']);
Route::post('/user/register', [AuthController::class, 'registerUser']);



RouteRegistrarService::registerCrudRoutes(RoomController::class, 'rooms');
