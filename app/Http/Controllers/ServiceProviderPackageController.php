<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use Auth;
use Carbon\Carbon;
use App\Models\ServiceProviderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceProviderPackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('service_provider_id', auth()->user()->id)->get();
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.package',compact('services', 'packages'));
    }
    public function create(){
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.create-package',compact('services'));
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
            'seat' => 'required|integer',
        ]);

        $service_provider_id = Auth::id();

        $package = new Package();
        $package->service_provider_id = $service_provider_id;
        $package->start_date = Carbon::createFromFormat("Y-m-d", $validatedData['startDate'])->toDateTimeString();
        $package->end_date = Carbon::createFromFormat("Y-m-d", $validatedData['endDate'])->toDateTimeString();
        $package->days = $validatedData['days'];
        $package->service_id = $validatedData['service_id'];
        $package->origin = $validatedData['origin'];
        $package->destination = $validatedData['destination'] ?? null;
        $package->hotel = $validatedData['hotel'] ?? null;
        $package->coach = $validatedData['coach'] ?? null;
        $package->shuttle = $validatedData['shuttle'] ?? null;
        

        
        $image = $request->file('image');
        if ($image->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $package->image = 'images/' . $imageName;
        }
        
        $package->price = $request->input('price');
        $package->seat = $request->input('seat');

        $package->save();
        return redirect()->route('service-provider.package')->with('success', 'Package Created Successfully');
    }

    public function edit(Package $package){
        $services = ServiceProviderServices::where('service_provider_id', auth()->user()->id)->get();
        return view('service-provider.edit-package',compact('services', 'package'));
    }

    public function update(Request $request, int $package)
    {
        
        
        $package = Package::find($package);
        $service_provider_id = Auth::id();
        $package->service_provider_id = $service_provider_id;
        $package->start_date = Carbon::createFromFormat("Y-m-d", $request->input('startDate'))->toDateTimeString();
        $package->end_date = Carbon::createFromFormat("Y-m-d", $request->input('endDate'))->toDateTimeString();
        $package->days = $request->input('days');
        $package->service_id = $request->input('service_id');
        $package->origin = $request->input('origin');
        $package->destination = $request->input('destination') ?? null;
        $package->hotel = $request->input('hotel') ?? null;
        $package->coach = $request->input('coach') ?? null;
        $package->shuttle = $request->input('shuttle') ?? null;
        

        
        $image = $request->file('image');
        if ($image->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $package->image = 'images/' . $imageName;
        }
        
        $package->price = $request->input('price');
        $package->seat = $request->input('seat');

        $package->save();
        


        return redirect()->route('service-provider.package')->with('success', 'Updated!');
    }

    public function destroy(int $package)
    {
        Package::find($package)->delete();
        return redirect()->route('service-provider.package')->with('success', 'Booking deleted successfully.');

    }
}
