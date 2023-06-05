<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProviderServices;
use App\Models\User;
use Illuminate\Http\Request;

class UserServiceProviderController extends Controller
{
    public function index()
    {
        $serviceProvider = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->get();

        $service = ServiceProviderServices::where('service_id', auth()->user()->id)->get();
        // $data = compact('serviceProviderServices', 'services', 'service');
        return view('user.service-providers', compact('serviceProvider', 'service'));
    }
    public function book()
    {
        return redirect('/user/service-providers');
    }
}
