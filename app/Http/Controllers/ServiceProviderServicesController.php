<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProviderServices;
use Illuminate\Http\Request;

class ServiceProviderServicesController extends Controller
{
    public function index()
    {
        $serviceProviderServices = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        $services = Service::all();
        return view('service-provider.services', compact('serviceProviderServices', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service-provider.services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceProviderServices = new ServiceProviderServices;
        $serviceProviderServices->service_id = $request->input('service_id');
        $serviceProviderServices->service_provider_id = auth()->user()->id;
        $serviceProviderServices->description = $request->input('description');
        $serviceProviderServices->price = $request->input('price');
        $serviceProviderServices->save();

        return redirect()->route('service-provider.services')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProviderServices $serviceProviderServices)
    {
        return view('service-provider.services', compact('serviceProviderServices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProviderServices $serviceProviderServices)
    {
        $services = Service::all();
        return view('service-provider.edit-service', compact('serviceProviderServices', 'services'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProviderServices $serviceProviderServices)
    {
        $serviceProviderServices->service_id = $request->input('service_id');
        $serviceProviderServices->description = $request->input('description');
        $serviceProviderServices->price = $request->input('price');
        $serviceProviderServices->save();

        return redirect()->route('service-provider.services')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceProviderServices $serviceProviderServices)
    {
        $serviceProviderServices->delete();

        return redirect('/services');
    }
}
