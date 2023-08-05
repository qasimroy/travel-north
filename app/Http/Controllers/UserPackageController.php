<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\packageBooking;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use PhpParser\Node\Expr\FuncCall;

class UserPackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            $packageBookings = packageBooking::where('package_id', $package->id)->get();
            $persons = $packageBookings->pluck('persons')->toArray();
            $totalPersonsBooked = array_sum($persons);
            if ($totalPersonsBooked >= $package->seat) {
                $package->status = Package::CLOSED;
                $package->save();
            }
            $package->persons_booked = $totalPersonsBooked;
            $package->save();
        }

        return view('user.package', compact('packages'));
    }
    public function book(int $id)
    {
        $package = Package::find($id);
        $user_id = Auth::id();

        if ($user_id) {
            return view('user.package-book', compact('package', 'user_id'));
        } else {
            return Redirect::route('login', ['redirect' => route('package.book', ['id' => $id])]);
        }
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
        return redirect()->route('user.bookings.show')->with('success', 'Package Booked Successfully!');
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
        $persons = $packageBooking->persons;
        $package = $packageBooking->package;
        $packageBooking->delete();
        $package->persons_booked -= $persons;
        $package->save();

        return redirect()->route('user.bookings.show')->with('success', 'Booking Deleted Successfully!');
    }
}
