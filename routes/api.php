<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CustomerShowController;
use App\Http\Controllers\CustomerStoreController;
use App\Http\Controllers\CustomerUpdateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlightIndexController;
use App\Http\Controllers\FlightPDFController;
use App\Http\Controllers\FlightStoreController;
use App\Http\Controllers\PaymentStoreController;
use App\Http\Controllers\TripDashboardController;
use App\Http\Controllers\TripStoreController;
use App\Http\Controllers\TripUpdateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', LoginController::class);
Route::post('/logout', LogoutController::class);


//dashboard
Route::get('/dashboard', DashboardController::class);
Route::get('/{trip:id}/dashboard', TripDashboardController::class);

// trip routes
Route::post('/trip/create', TripStoreController::class);
Route::put('/trip/update/{trip:id}', TripUpdateController::class);


// flight routes
Route::get('/{trip:id}/flight', FlightIndexController::class);
Route::post('/{trip:id}/flight', FlightStoreController::class);
Route::get('/{trip:id}/flight/{flight:id}/download', FlightPDFController::class);

// customer routes
Route::get('/{trip:id}/customer/{customer:id}', CustomerShowController::class);
Route::post('/{trip:id}/customer', CustomerStoreController::class);
Route::put('/{trip:id}/customer/{customer:id}', CustomerUpdateController::class);


// payment routes
Route::post('/{trip:id}/{customer:id}/payment', PaymentStoreController::class);
