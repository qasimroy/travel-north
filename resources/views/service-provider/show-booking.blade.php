@extends('layouts.app')
@section('content')
@include('service-provider.layouts.header')
<h2 class="fs-2 m-0">Booking</h2>
</div>
</nav>
<div class="container d-flex justify-content-center">
    <div class="w-50 p-5 bg-white rounded">
        <div class="row">
            <div class="col-md-6">
                <x-form-input name="startDate" label="Start Date" type="date" value="{{ $booking->start_date }}" readonly autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="endDate" label="End Date" type="date" value="{{ $booking->end_date  }}" readonly autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="service" label="Service" type="text" value="{{ $booking->service->name }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="origin" label="Origin" type="text" value="{{ $booking->origin }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="destination" label="Destination" type="text" value="{{ $booking->destination }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="persons" label="Persons" type="number" value="{{ $booking->person }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="hotel" label="Hotel" type="text" value="{{ $booking->hotel }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="coach" label="Coach" type="text" value="{{ $booking->coach }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="shuttle" label="Shuttle" type="text" value="{{ $booking->shuttle }}" readonly  autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="price" label="Price" type="number" value="{{ $booking->price }}" readonly  autofocus />
            </div>
            <div class="col-md-6 pt-2">   
                @if ($booking->status === 'pending')
                    <div class="d-flex justify-content-start">
                        <div class="mx-1">
                            <form action="{{ route('service-provider.bookings.accept', ['id' => $booking]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                        </div>
                        <div class="mx-1">
                            <form action="{{ route('service-provider.bookings.reject', ['id' => $booking]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                        <div class="mx-1">
                            <a href="{{ route('service-provider.booking.close') }}" class="btn btn-secondary" >Close</a>
                        </div>
                    </div>
                @elseif ($booking->status === 'accepted')
                <div class="d-flex justify-content-start">
                    <div class="mx-1">
                        <form action="{{ route('service-provider.bookings.complete', ['id' => $booking]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Complete</button>
                        </form>
                    </div>
                    <div class="mx-1">
                        <a href="{{ route('service-provider.booking.close') }}" class="btn btn-secondary" >Close</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
@endsection