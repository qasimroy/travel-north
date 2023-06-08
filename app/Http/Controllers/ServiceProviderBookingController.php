<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ServiceProviderBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.bookings', compact('bookings'));
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
}
