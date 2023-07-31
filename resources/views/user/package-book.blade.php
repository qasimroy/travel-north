@extends('layouts.app')
@section('content')
    @include('user.layouts.header')
    <h2 class="fs-2 m-0">Edit Booking</h2>
    </div>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="w-50 p-5 bg-white rounded">
            <h2>Book Package: {{ $package->days }} Days Trip from {{ $package->origin }} to {{ $package->destination }}</h2>
            <hr>
            <form method="POST" action="{{ route('user.package.book.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <div class="mb-3">
                    <label for="persons" class="form-label">Number of Persons</label>
                    <input type="number" class="form-control" id="persons" name="persons" required>
                </div>
                <button type="submit" class="btn btn-outline-success">Book Now</button>
            </form>
        </div>
    </div>
    </div>
    <!-- #page-content-wrapper -->
    </div>
@endsection
