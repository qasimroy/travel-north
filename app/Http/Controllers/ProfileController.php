<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $adminRole = Role::where('name', 'Admin')->firstOrFail();
        $user = $adminRole->users()->first();

        return view('admin.profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('profile');
    }
}
