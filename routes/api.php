<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TravelOrderController;
use Illuminate\Support\Facades\Route;

Route::post('/', [LoginController::class, 'login'])->name('login'); 

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('/users', [UserController::class, 'index']); 

    Route::post('/logout/{user}', [LoginController::class, 'logout']); 
});

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('travel-orders', TravelOrderController::class);
});