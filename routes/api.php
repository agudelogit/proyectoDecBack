<?php

use App\Http\Controllers\Api\AcomodacionesController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\TipHabAcomController;
use App\Http\Controllers\Api\TiposHabitacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(HotelController::class)->group(function () {
    Route::get('/hotels', 'index');
    Route::post('/hotel', 'store');
    Route::get('/hotel/{id}', 'show');
    Route::put('/hotel/{id}', 'update');
    Route::delete('/hotel/{id}', 'destroy');
});

Route::controller(TiposHabitacionController::class)->group(function () {
    Route::get('/room', 'index');    
});

Route::controller(TipHabAcomController::class)->group(function () {
    Route::get('/tha/{id}', 'show');    
    Route::post('/tha', 'store');    
});

Route::controller(AcomodacionesController::class)->group(function () {
    Route::get('/acomodacion', 'index');    
});