<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;

class UserBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('user.bookings', compact('services'));
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
