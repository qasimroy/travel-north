<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserServiceProviderController extends Controller
{
    public function index()
    {
        $serviceProvider = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->get();
        return view('user.service-providers', compact('serviceProvider'));
    }
}
