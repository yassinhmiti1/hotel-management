<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Controllers\Api\V1\ClientsController;
use App\Http\Controllers\Api\V1\RoomsController;
use App\Http\Controllers\Api\V1\RoomTypesController;
use App\Http\Controllers\Api\V1\ReservationsController;
use App\Http\Controllers\Api\V1\PaymentsController;
use App\Http\Controllers\Api\V1\FactureController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function(){
    Route::apiResource('users', UsersController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('clients', ClientsController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('rooms', RoomsController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('room-type', RoomTypesController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('reservation', ReservationsController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('payments', PaymentsController::class);
});

Route::prefix('v1')->group(function(){
    Route::apiResource('facture', FactureController::class);
});