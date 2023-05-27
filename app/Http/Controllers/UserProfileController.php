<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('user.profile');
    }
}
