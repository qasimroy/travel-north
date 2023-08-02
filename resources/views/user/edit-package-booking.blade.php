@extends('layouts.app')
@section('content')
    @include('user.layouts.header')
    <h2 class="fs-2 m-0">Edit Package Booking</h2>
    </div>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="w-50 p-5 bg-white rounded">
            <form class="row g-3 text-dark" method="POST"
                action="{{ route('user.bookings.package.update', ['id' => $packageBookings->id]) }}">
                @csrf
                <div class="col-md-6">
                    <x-form-input name="persons" label="Persons" type="number" value="{{ $packageBookings->persons }}"
                        required autofocus />
                </div>

                <div class="col-12">
                    <x-form-submit class=" text-white">Update</x-form-submit>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
@endsection
