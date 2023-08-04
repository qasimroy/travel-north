<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceProviderBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('service-provider.bookings', compact('bookings'));
    }

    public function pending()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)
        ->where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('service-provider.pending-booking', compact('bookings'));
    }
    public function accepted()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)
        ->where('status', 'accepted')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('service-provider.accepted-booking', compact('bookings'));
    }
    public function rejected()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)
        ->where('status', 'rejected')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('service-provider.rejected-booking', compact('bookings'));
    }
    public function completed()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)
        ->where('status', 'completed')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('service-provider.completed-booking', compact('bookings'));
    }
    public function reject(Request $request, int $id)
    {
        $booking = Booking::find($id);
        $booking->status = Booking::REJECTED;
        $booking->save();

        return redirect()->back();
    }

    public function accept(Request $request, int $id)
    {
        $booking = Booking::find($id);
        $booking->status = Booking::ACCEPTED;
        $booking->save();

        return redirect()->back();
    }

    public function complete(Request $request, int $id)
    {
        $booking = Booking::find($id);
        $booking->status = Booking::COMPLETED;
        $booking->save();

        return redirect()->back();
    }
    public function show(Request $request, int $id)
    {
        $booking = Booking::find($id);
        return view('service-provider.show-booking', compact('booking'));
    }
}
