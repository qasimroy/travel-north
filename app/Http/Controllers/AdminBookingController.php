<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(8);
        return view('admin.bookings', compact('bookings'));
    }
    public function pending()
    {
        $bookings = Booking::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('admin.pending-booking', compact('bookings'));
    }
    public function accepted()
    {
        $bookings = Booking::where('status', 'accepted')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('admin.accepted-booking', compact('bookings'));
    }
    public function rejected()
    {
        $bookings = Booking::where('status', 'rejected')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('admin.rejected-booking', compact('bookings'));
    }
    public function completed()
    {
        $bookings = Booking::where('status', 'completed')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('admin.completed-booking', compact('bookings'));
    }
}
