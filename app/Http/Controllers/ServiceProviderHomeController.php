<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\packageBooking;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceProviderHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $bookingCount = Booking::where('service_provider_id', auth()->user()->id)->count();
        $pendingBookingCount = Booking::where('service_provider_id', auth()->user()->id)->where('status', 'pending')->count();
        $acceptedBookingCount = Booking::where('service_provider_id', auth()->user()->id)->where('status', 'accepted')->count();
        $rejectedBookingCount = Booking::where('service_provider_id', auth()->user()->id)->where('status', 'rejected')->count();
        $completedBookingCount = Booking::where('service_provider_id', auth()->user()->id)->where('status', 'completed')->count();
        $serviceProviderId = auth()->user()->id;
        $packageBookingCount = PackageBooking::whereHas('package', function ($query) use ($serviceProviderId) {
            $query->where('service_provider_id', $serviceProviderId);
        })->count();
        
        $packageCount = Package::where('service_provider_id', auth()->user()->id)->count();
        $serviceCount = Service::count();
        $recentBookings = Booking::where('service_provider_id', auth()->user()->id)->latest()->take(4)->get();
        $recentPackageBookings = PackageBooking::whereHas('package', function ($query) use ($serviceProviderId) {
            $query->where('service_provider_id', $serviceProviderId);
        })->latest()->take(2)->get();



        return view('service-provider.home', compact('serviceCount', 'bookingCount', 
        'pendingBookingCount', 'acceptedBookingCount', 'rejectedBookingCount', 'completedBookingCount', 'packageBookingCount', 'packageCount',
        'recentBookings', 'recentPackageBookings'));
    }
}
