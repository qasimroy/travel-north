<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceProviderServices;
use Illuminate\Http\Request;

class ServiceProviderPackageController extends Controller
{
    public function index()
    {
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.package',compact('services'));
    }
}
