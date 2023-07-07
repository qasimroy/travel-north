<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminServiceProviderController;
use App\Http\Controllers\AdminServicesController;
use App\Http\Controllers\ServiceProviderServicesController;
use App\Http\Controllers\UserServicesController;
use App\Http\Controllers\ServiceProviderBookingController;
use App\Http\Controllers\UserServiceProviderController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceProviderHomeController;
use App\Http\Controllers\ServiceProviderPackageController;
use App\Http\Controllers\ServiceProviderProfileController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserPackageController;
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
Route::get('/package', [PackageController::class, 'index'])->name('package');
Route::get('/service-providers', [ServiceProviderController::class, 'index'])->name('service-providers');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/services', [ServiceController::class, 'index'])->name('services');




Route::group(['middleware' => ['restrict.user']], function () {
    Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::get('/user/bookings', [UserBookingController::class, 'index'])->name('user.bookings');
    Route::get('/user/bookings/create', [UserBookingController::class, 'create'])->name('user.bookings.create');
    Route::get('/user/bookings/trash', [UserBookingController::class, 'trash'])->name('user.bookings.trash');
    Route::delete('/user/bookings/trash/delete/{id}', [UserBookingController::class, 'forceDelete'])->name('user.bookings.trash.delete');
    Route::get('/user/bookings/restore/{id}', [UserBookingController::class, 'restore'])->name('user.bookings.restore');
    Route::post('/user/bookings', [UserBookingController::class, 'store'])->name('user.bookings.store');
    Route::get('/user/bookings/{bookings}/edit', [UserBookingController::class, 'edit'])->name('user.bookings.edit');
    Route::post('/user/bookings/{bookings}', [UserBookingController::class, 'update'])->name('user.bookings.update');
    Route::delete('/user/bookings/{bookings}', [UserBookingController::class, 'destroy'])->name('user.bookings.destroy');
    Route::get('/user/service-providers', [UserServiceProviderController::class, 'index'])->name('user.service-providers');
    Route::get('/user/service-providers/book/', [UserServiceProviderController::class, 'book'])->name('user.service-providers.book');
    Route::get('/user/services', [UserServicesController::class, 'index'])->name('user.services');
    Route::get('/user/package', [UserPackageController::class, 'index'])->name('user.package');
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/{profile}', [UserProfileController::class, 'update'])->name('user.profile.update');
});

Route::group(['middleware' => ['restrict.service-provider']], function () {
    Route::get('/service-providers/home', [ServiceProviderHomeController::class, 'index'])->name('service-providers.home');
    Route::get('/service-provider/bookings', [ServiceProviderBookingController::class, 'index'])->name('service-provider.bookings');
    Route::post('/service-provider/bookings/accept/{id}', [ServiceProviderBookingController::class, 'accept'])->name('service-provider.bookings.accept');
    Route::post('/service-provider/bookings/reject/{id}', [ServiceProviderBookingController::class, 'reject'])->name('service-provider.bookings.reject');
    Route::post('/service-provider/bookings/complete/{id}', [ServiceProviderBookingController::class, 'complete'])->name('service-provider.bookings.complete');
    Route::get('/service-provider/bookings/show/{id}', [ServiceProviderBookingController::class, 'show'])->name('service-provider.booking.show');
    Route::get('/service-provider/bookings/', [ServiceProviderBookingController::class, 'index'])->name('service-provider.booking.close');
    Route::get('/service-provider/services', [ServiceProviderServicesController::class, 'index'])->name('service-provider.services');
    Route::post('/service-provider/services', [ServiceProviderServicesController::class, 'store'])->name('service-provider.services.store');
    Route::get('/service-provider/services/{serviceProviderServices}/edit', [ServiceProviderServicesController::class, 'edit'])->name('service-provider.services.edit');
    Route::post('/service-provider/services/{serviceProviderServices}', [ServiceProviderServicesController::class, 'update'])->name('service-provider.services.update');
    Route::delete('/service-provider/services/{serviceProviderServices}', [ServiceProviderServicesController::class, 'destroy'])->name('service-provider.services.destroy');
    Route::get('/service-provider/package', [ServiceProviderPackageController::class, 'index'])->name('service-provider.package');
    Route::get('/service-provider/profile', [ServiceProviderProfileController::class, 'index'])->name('service-provider.profile');
    Route::post('/service-provider/profile/{profile}', [ServiceProviderProfileController::class, 'update'])->name('service-provider.profile.update');
});

Route::group(['middleware' => ['restrict.admin']], function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/service-providers', [AdminServiceProviderController::class, 'index'])->name('admin.service-providers');
    Route::get('/admin/services', [AdminServicesController::class, 'index'])->name('admin.services');
    Route::post('/admin/services', [AdminServicesController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [AdminServicesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/admin/services/{service}', [AdminServicesController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [AdminServicesController::class, 'destroy'])->name('admin.services.destroy');
    Route::get('/admin/package',[AdminPackageController::class, 'index'])->name('admin.package');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/{profile}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});
