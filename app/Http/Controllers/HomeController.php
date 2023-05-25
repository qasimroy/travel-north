<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serviceCount = Service::count();
        $userCount = User::count();
        $serviceProviderCount = User::where('id', 2)->count();
        return view('home', compact('serviceCount', 'userCount', 'serviceProviderCount'));
    }
}
