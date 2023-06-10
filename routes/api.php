<?php

use App\Http\Controllers\MapsProxyController;
use App\Http\Controllers\UserBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('service-providers/{service_id}', [UserBookingController::class, 'getServiceProviders']);

Route::get('/proxy/maps-api', [MapsProxyController::class, 'proxyRequest'])->name('proxy.maps-api');
