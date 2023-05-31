<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Service Provider')) {
            return redirect()->route('service-provider.services');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.services');
        } elseif ($user->hasRole('Admin')) {
            return redirect()->route('admin.services');
        }
        return redirect()->route('services')->with('error', 'Unknown user role.');
    }
}
