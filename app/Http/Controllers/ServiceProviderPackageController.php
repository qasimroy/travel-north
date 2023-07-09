<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use Auth;
use Carbon\Carbon;
use App\Models\ServiceProviderServices;
use Illuminate\Http\Request;

class ServiceProviderPackageController extends Controller
{
    public function index()
    {
        $package = Package::where('service_provider_id', auth()->user()->id)->get();
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.package',compact('services', 'package'));
    }
    public function create(){
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.create-package',compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'startDate' => 'required|date_format:Y-m-d',
            'endDate' => 'required|date_format:Y-m-d',
            'days' => 'required|integer',
            'service_id' => 'required|exists:services,id',
            'origin' => 'required|string',
            'destination' => 'sometimes|nullable|string',
            'hotel' => 'sometimes|nullable|string',
            'coach' => 'sometimes|nullable|string',
            'shuttle' => 'sometimes|nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'price' => 'required|integer',
        ]);

        $service_provider_id = Auth::id();

        $package = new Package();
        $package->service_provider_id = $service_provider_id;
        $package->start_date = Carbon::createFromFormat("Y-m-d", $validatedData['startDate'])->toDateTimeString();
        $package->start_date = Carbon::createFromFormat("Y-m-d", $validatedData['endDate'])->toDateTimeString();
        $package->days = $validatedData['days'];
        $package->service_id = $validatedData['service_id'];
        $package->origin = $validatedData['origin'];
        $package->destination = $validatedData['destination'] ?? null;
        $package->person = $validatedData['persons'];
        $package->hotel = $validatedData['hotel'] ?? null;
        $package->coach = $validatedData['coach'] ?? null;
        $package->shuttle = $validatedData['shuttle'] ?? null;
        
        if ($request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $package->image = 'images/' . $imageName;
        }   

        $package->price = $request->input('price');

        $package->save();
        return redirect()->route('service-provider.package')->with('success', 'Package Created Successfully');
    }
}
