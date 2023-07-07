<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function index()
    {
        return view('user.package');
    }
}
