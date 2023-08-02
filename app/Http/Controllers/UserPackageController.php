<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\packageBooking;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('user.package', compact('packages'));
    }
    public function book(int $id)
    {
        $package = Package::where('id', $id)->first();
        $user_id = User::where('id', auth()->user()->id)->pluck('id')->first();
        return view('user.package-book', compact('package', 'user_id'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'persons' => 'required|numeric|min:1',
        ]);
        
        $packageBooking = new packageBooking();
        $packageBooking->user_id = $validatedData['user_id'];
        $packageBooking->package_id = $validatedData['package_id'];
        $packageBooking->persons = $validatedData['persons'];
        $packageBooking->status = packageBooking::PENDING;

        $packageBooking->save();
        return redirect()->route('user.package')->with('success', 'Package Booked Successfully!');
    }
    public function show()
    {
        $packageBookings = packageBooking::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('user.packaged-booking', compact('packageBookings'));
    }
    public function edit($id)
    {
        $packageBookings = PackageBooking::findOrFail($id);
        return view('user.edit-package-booking', compact('packageBookings'));
    }
    public function update(Request $request, $id)
    {
        $packageBooking = PackageBooking::findOrFail($id);

        $validatedData = $request->validate([
            'persons' => 'required|numeric|min:1',
        ]);
        $packageBooking->persons = $validatedData['persons'];
        $packageBooking->save();

        return redirect()->route('user.bookings.show')->with('success', 'Booking Updated Successfully!');
    }
    public function destroy($id)
    {
        $packageBooking = PackageBooking::findOrFail($id);
        $packageBooking->delete();

        return redirect()->route('user.bookings.show')->with('success', 'Booking Deleted Successfully!');
    }

}
