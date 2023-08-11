<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\packageBooking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;

class UserHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $bookingCount = Booking::where('user_id', auth()->user()->id)->count();
        $pendingBookingCount = Booking::where('user_id', auth()->user()->id)->where('status', 'pending')->count();
        $acceptedBookingCount = Booking::where('user_id', auth()->user()->id)->where('status', 'accepted')->count();
        $rejectedBookingCount = Booking::where('user_id', auth()->user()->id)->where('status', 'rejected')->count();
        $completedBookingCount = Booking::where('user_id', auth()->user()->id)->where('status', 'completed')->count();
        $packageBookingCount = packageBooking::where('user_id', auth()->user()->id)->count();
        $packageCount = Package::count();
        $serviceCount = Service::count();
        $serviceProviderCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->count();
        $recentBookings = Booking::where('user_id', auth()->user()->id)->latest()->take(4)->get();
        $recentPackageBookings = packageBooking::where('user_id', auth()->user()->id)->latest()->take(2)->get();

        return view('user.home', compact('serviceCount', 'serviceProviderCount', 'bookingCount', 'packageBookingCount', 'pendingBookingCount', 'acceptedBookingCount'
    ,  'rejectedBookingCount', 'completedBookingCount', 'packageCount', 'recentBookings', 'recentPackageBookings'));
    }
}
