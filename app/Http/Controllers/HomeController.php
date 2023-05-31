<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


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
        $user = auth()->user();

        if ($user->hasRole('Service Provider')) {
            return redirect()->route('service-providers.home');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.home');
        } elseif ($user->hasRole('Admin')) {
            $serviceCount = Service::count();
            $userCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->count();
            $serviceProviderCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'service_provider');
            })->count();
            $data = compact('serviceCount', 'userCount', 'serviceProviderCount');
            return redirect()->route('admin.home')->with($data);
        }

        // If the user doesn't have any recognized role or encounters an error,
        // redirect them to a default page or show an error message.
        return redirect()->route('home')->with('error', 'Unknown user role.');
    }
}
