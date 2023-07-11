<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Service Provider')) {
            return redirect()->route('service-provider.package');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.package');
        } elseif ($user->hasRole('Admin')) {

            return redirect()->route('admin.package');
        }
        return redirect()->route('package')->with('error', 'Unknown user role.');
    }

    public function show(){
        $packages = Package::all();
        return view('package',compact('packages'));
    }
}
