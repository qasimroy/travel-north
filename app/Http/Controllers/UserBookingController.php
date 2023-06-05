<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('user.bookings', compact('services'));
    }
}
