<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceProviderHomeController;
use App\Http\Controllers\UserHomeController;
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
Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home')->middleware('restrict.user');
Route::get('/service-providers/home', [ServiceProviderHomeController::class, 'index'])->name('service-providers.home')->middleware('restrict.service-provider');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home')->middleware('restrict.admin');
Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings');
Route::get('/service-providers', [ServiceProviderController::class, 'index'])->name('service-providers');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::post('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
