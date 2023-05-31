<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('User')) {
            return redirect()->route('user.service-providers');
        } elseif ($user->hasRole('Admin')) {
            return redirect()->route('admin.service-providers');
        }
        return redirect()->route('service-providers')->with('error', 'Unknown user role.');
    }
}
