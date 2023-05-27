<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceProviderHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $serviceCount = Service::count();
        $userCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'User');
        })->count();
        $serviceProviderCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->count();

        return view('service-provider.home', compact('serviceCount', 'userCount', 'serviceProviderCount'));
    }
}
