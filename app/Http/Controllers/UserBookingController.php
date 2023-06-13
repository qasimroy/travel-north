<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ServiceProviderServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        $services = Service::all();

        $cities = Booking::CITIES;

        return view('user.bookings', compact('services', 'bookings', 'cities'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'startDate' => 'required|date_format:Y-m-d',
            'endDate' => 'required|date_format:Y-m-d',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'required|exists:users,id',
            'origin' => 'required|string',
            'destination' => 'sometimes|nullable|string',
            'persons' => 'required|integer',
            'hotel' => 'sometimes|nullable|string',
            'coach' => 'sometimes|nullable|string',
            'shuttle' => 'sometimes|nullable|string',
        ]);

        // Fetch the current user ID
        $user_id = Auth::id();

        // Create a new booking instance and set its attributes
        $booking = new Booking();
        $booking->user_id = $user_id;
        $booking->start_date = Carbon::createFromFormat("Y-m-d", $validatedData['startDate'])->toDateTimeString();
        $booking->end_date = Carbon::createFromFormat("Y-m-d", $validatedData['endDate'])->toDateTimeString();
        $booking->service_id = $validatedData['service_id'];
        $booking->service_provider_id = $validatedData['service_provider_id'];
        $booking->origin = $validatedData['origin'];
        $booking->destination = $validatedData['destination'] ?? null;
        $booking->person = $validatedData['persons'];
        $booking->hotel = $validatedData['hotel'] ?? null;
        $booking->coach = $validatedData['coach'] ?? null;
        $booking->shuttle = $validatedData['shuttle'] ?? null;
        $booking->price = null;
        $booking->status = Booking::PENDING;

        // Save the booking
        $booking->save();

        // Redirect to the bookings index page or show a success message
        return redirect()->route('user.bookings')->with('success', 'Booking created successfully.');
    }
    public function edit(Booking $bookings)
    {
        $services = Service::all();

        $cities = Booking::CITIES;

        return view('user.edit-booking', compact('bookings', 'services', 'cities'));
    }
    public function create()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        $services = Service::all();

        $cities = Booking::CITIES;
        return view('user.create-booking', compact('bookings', 'services', 'cities'));
    }

    public function update(Request $request, int $booking)
    {
        $booking = Booking::find($booking);
        $booking->start_date = Carbon::createFromFormat("Y-m-d", $request->input('startDate'))->toDateTimeString();
        $booking->end_date = Carbon::createFromFormat("Y-m-d", $request->input('endDate'))->toDateTimeString();
        $booking->service_id = $request->input('service_id');
        $booking->service_provider_id = $request->input('service_provider_id');
        $booking->origin = $request->input('origin');
        $booking->destination = $request->input('destination') ?? null;
        $booking->person = $request->input('persons');
        $booking->hotel = $request->input('hotel') ?? null;
        $booking->coach = $request->input('coach') ?? null;
        $booking->shuttle = $request->input('shuttle') ?? null;
        $booking->price = null;
        $booking->status = Booking::PENDING;
        $booking->update();

        return redirect()->route('user.bookings')->with('success', 'Booking updated successfully.');
    }

    public function destroy(int $booking)
    {
        Booking::find($booking)->delete();
        return redirect()->route('user.bookings')->with('success', 'Booking deleted successfully.');
    }


    public function getServiceProviders(int $service_id)
    {
        return ServiceProviderServices::where('service_id', $service_id)
            ->with('serviceProvider')
            ->get()
            ->toArray();
    }
}
