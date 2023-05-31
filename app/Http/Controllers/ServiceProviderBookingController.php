<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderBookingController extends Controller
{
    public function index()
    {
        return view('service-provider.bookings');
    }
}
