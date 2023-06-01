<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ServiceProviderProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('service-provider.profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->cnic = $request->input('cnic');
        $user->address = $request->input('address');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('profile');
    }
}
