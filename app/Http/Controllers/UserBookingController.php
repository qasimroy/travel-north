<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ServiceProviderServices;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        $services = Service::all();
        $serviceProviderIds = $bookings->pluck('service_provider_id')->toArray();
        $serviceProviders = User::whereIn('id', $serviceProviderIds)->get();

        foreach ($bookings as $booking) {
            if ($booking->status === 'accepted') {
                $serviceProvider = $serviceProviders->firstWhere('id', $booking->service_provider_id);
                $booking->serviceProvider = $serviceProvider;
            }
        }
        return view('user.bookings', compact('services', 'bookings'));
    }

    public function store(Request $request)
    {
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
            'price' => 'required|integer',
        ]);

        $user_id = Auth::id();

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
        $booking->price = $request->input('price');
        $booking->status = Booking::PENDING;

        $booking->save();

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
        $booking->price = $request->input('price');
        $booking->status = Booking::PENDING;
        $booking->update();

        return redirect()->route('user.bookings')->with('success', 'Booking updated successfully.');
    }

    public function destroy(int $booking)
    {
        Booking::find($booking)->delete();
        return redirect()->route('user.bookings')->with('success', 'Booking trashed successfully.');
    }

    public function trash()
    {
        $bookings = Booking::onlyTrashed()->get();
        return view('user.trashed-bookings', compact('bookings'));
    }

    public function forceDelete($id)
    {
        $bookings = Booking::withTrashed()->find($id);
        if (!is_null($bookings)) {
            $bookings->forceDelete();
        }
        return redirect()->route('user.bookings.trash')->with('success', 'Booking deleted successfully.');
    }

    public function restore($id)
    {
        $bookings = Booking::withTrashed()->find($id);
        if (!is_null($bookings)) {
            $bookings->restore();
        }
        return redirect()->route('user.bookings.trash');
    }


    public function getServiceProviders(int $service_id)
    {
        return ServiceProviderServices::where('service_id', $service_id)
            ->with('serviceProvider')
            ->get()
            ->toArray();
    }
}
