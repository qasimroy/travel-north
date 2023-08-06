<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\packageBooking;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package', compact('packages'));
    }
    public function show()
    {
        $packageBookings = packageBooking::orderBy('created_at', 'desc')
        ->paginate(8);
        return view('admin.packaged-booking', compact('packageBookings'));
    }
}
