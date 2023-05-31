<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminServiceProviderController extends Controller
{
    public function index()
    {
        return view('admin.service-providers');
    }
}
