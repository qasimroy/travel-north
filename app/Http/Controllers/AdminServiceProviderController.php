<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class AdminServiceProviderController extends Controller
{
    public function index()
    {
        $serviceProvider = User::whereHas('roles', function ($query) {
            $query->where('name', 'Service Provider');
        })->get();
        return view('admin.service-providers', compact('serviceProvider'));
    }
    public function edit(User $ServiceProvider)
    {
        return view('admin.edit-service-provider', compact('ServiceProvider'));
    }
    public function update(Request $request, $ServiceProvider)
    {   
        $users = User::find($ServiceProvider);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->cnic = $request->input('cnic');
        $users->address = $request->input('address');
        $users->save();

        return redirect()->route('admin.service-providers')->with('success', 'Service Provider Updated Successfully!');
    }
    public function destroy(Request $request, $ServiceProvider)
    {
        $serviceProvider = User::find($ServiceProvider);

        if (!$serviceProvider) {
            return redirect()->route('admin.service-providers')->with('error', 'Service Provider not found.');
        }
        $serviceProvider->delete();

        return redirect()->route('admin.service-providers')->with('success', 'Service Provider deleted successfully.');
    }
}
