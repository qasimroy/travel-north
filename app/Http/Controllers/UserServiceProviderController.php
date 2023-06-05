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

        $serviceProviderId = $serviceProvider->pluck('id')->toArray();
        $services = [];

        foreach ($serviceProviderId as $serviceProviderIds) {
            $service = ServiceProviderServices::where('service_provider_id', $serviceProviderIds)->get();
            $services[$serviceProviderIds] = $service;
        }

        return view('user.service-providers', compact('serviceProvider', 'services'));
    }
    public function book()
    {
        return redirect('/user/service-providers');
    }
}
