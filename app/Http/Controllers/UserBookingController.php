<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('user.bookings', compact('services'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'required|exists:users,id',
            'origin' => 'required|string',
            'destination' => 'nullable|string',
            'person' => 'required|integer',
            'hotel' => 'nullable|string',
            'coach' => 'nullable|string',
            'shuttle' => 'nullable|string',
            'price' => 'nullable|integer',
            'status' => 'required|in:accepted,rejected,completed,pending',
        ]);

        // Fetch the current user ID
        $user_id = Auth::id();

        // Create a new booking instance and set its attributes
        $booking = new Booking();
        $booking->user_id = $user_id;
        $booking->start_date = $validatedData['startDate'];
        $booking->end_date = $validatedData['endDate'];
        $booking->service_id = $validatedData['service_id'];
        $booking->service_provider_id = $validatedData['service_provider_id'];
        $booking->origin = $validatedData['origin'];
        $booking->destination = $validatedData['destination'];
        $booking->person = $validatedData['person'];
        $booking->hotel = $validatedData['hotel'];
        $booking->coach = $validatedData['coach'];
        $booking->shuttle = $validatedData['shuttle'];
        $booking->price = $validatedData['price'];
        $booking->status = $validatedData['status'];
        $booking->status = Booking::PENDING;

        // Save the booking
        $booking->save();

        // Redirect to the bookings index page or show a success message
        return redirect()->route('user.bookings')->with('success', 'Booking created successfully.');
    }


    public function getServiceProviders(int $service_id)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->whereHas('serviceProviderServices', function ($query) use ($service_id) {
            $query->where('service_id', $service_id);
        })->get()->toArray();
    }
}
