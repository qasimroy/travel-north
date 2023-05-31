<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProviderServices;
use Illuminate\Http\Request;

class ServiceProviderServicesController extends Controller
{
    public function index()
    {
        $serviceProviderServices = ServiceProviderServices::all();
        $services = Service::all();
        return view('service-provider.services', compact('services', 'serviceProviderServices'));
    }
}
