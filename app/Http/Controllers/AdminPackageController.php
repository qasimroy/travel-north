<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        return view('admin.package');
    }
}
