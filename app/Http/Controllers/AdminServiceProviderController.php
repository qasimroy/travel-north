<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminServiceProviderController extends Controller
{
    public function index()
    {
        $serviceProvider = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        });
        return view('admin.service-providers');
    }
}
