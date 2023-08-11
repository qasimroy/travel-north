<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\packageBooking;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;


class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $bookingCount = Booking::count();
        $pendingBookingCount = Booking::where('status', 'pending')->count();
        $acceptedBookingCount = Booking::where('status', 'accepted')->count();
        $rejectedBookingCount = Booking::where('status', 'rejected')->count();
        $completedBookingCount = Booking::where('status', 'completed')->count();
        $packageBookingCount = packageBooking::count();
        $serviceCount = Service::count();
        $packageCount = Package::count();
        $userCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'User');
        })->count();
        $serviceProviderCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->count();

        $recentBookings = Booking::latest()->take(4)->get();
        $recentPackageBookings = packageBooking::latest()->take(2)->get();

        return view('admin.home', compact('serviceCount', 'userCount', 'serviceProviderCount', 'bookingCount', 'packageBookingCount', 'pendingBookingCount', 'acceptedBookingCount',
        'rejectedBookingCount', 'completedBookingCount', 'recentBookings' ,'recentPackageBookings', 'packageCount'));
    }
}
