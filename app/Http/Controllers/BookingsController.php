<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Service Provider')) {
            return redirect()->route('service-provider.bookings');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.bookings');
        } elseif ($user->hasRole('Admin')) {

            return redirect()->route('admin.bookings');
        }
        return redirect()->route('bookings')->with('error', 'Unknown user role.');
    }
}
