<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserServiceProviderController extends Controller
{
    public function index()
    {
        return view('user.service-providers');
    }
}
