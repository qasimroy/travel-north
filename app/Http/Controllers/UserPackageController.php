<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('user.package', compact('packages'));
    }
}
