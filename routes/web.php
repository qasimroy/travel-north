<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceProviderHomeController;
use App\Http\Controllers\ServiceProviderProfileController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserProfileController;
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
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::post('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');


Route::group(['middleware' => ['restrict.user']], function () {
    Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/{profile}', [UserProfileController::class, 'update'])->name('user.profile.update');
});

Route::group(['middleware' => ['restrict.service-provider']], function () {
    Route::get('/service-providers/home', [ServiceProviderHomeController::class, 'index'])->name('service-providers.home');
    Route::get('/service-provider/profile', [ServiceProviderProfileController::class, 'index'])->name('service-provider.profile');
    Route::post('/service-provider/profile/{profile}', [ServiceProviderProfileController::class, 'update'])->name('service-provider.profile.update');
});

Route::group(['middleware' => ['restrict.admin']], function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/{profile}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});
