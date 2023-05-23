<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');
Route::get('/service-providers', [ServiceProviderController::class, 'index'])->name('service-providers');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
