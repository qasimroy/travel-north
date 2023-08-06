@extends('layouts.app')

@section('content')
    @include('admin.layouts.header')
    <h2 class="fs-2 m-0">Bookings</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row my-2 w-100">
            <div class="d-flex justify-content-between">
                <div class="w-50">
                    <x-form-select label="" name="book" class="border-0">
                        <option value="all">All Bookings</option>
                        <option value="pending">Pending Bookings</option>
                        <option value="accepted" selected>Accepted Bookings</option>
                        <option value="rejected">Rejected Bookings</option>
                        <option value="completed">Completed Bookings</option>
                    </x-form-select>
                </div>
                <div>
                    <a href="{{ route('admin.bookings.package') }}" class="btn btn-info text-white">Packaged Booking</a>
                </div>
            </div>
        </div>

        <div class="row">
            @php
                $count = 1;
            @endphp
            @foreach ($bookings as $booking)
                <div class="col-md-3 my-2">
                    <div class="card shadow border-0 h-100">
                        <div class="card-header border-0">
                            <b>Custom Booking {{ $count++ }}</b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Origin</b>
                                <p>{{ $booking->origin }}</p>
                                @if ($booking->destination != null)
                                    <b>Destination </b>
                                    <p>{{ $booking->destination }}</p>
                                @endif
                            </h5>
                            <hr>
                            <div class="card-text">
                                <p><b>Dated:</b> {{ $booking->start_date }} till {{ $booking->end_date }}</p>
                                <p><b>Price:</b> {{ $booking->price }}</p>
                                <p>{!! $booking->status == 'pending'
                                    ? '<b class="text-secondary">Pending</b>'
                                    : ($booking->status == 'accepted'
                                        ? '<b class="text-success">Accepted</b>'
                                        : ($booking->status == 'rejected'
                                            ? '<b class="text-danger">Rejected</b>'
                                            : ($booking->status == 'completed'
                                                ? '<b class="text-success">Completed</b>'
                                                : 'Unknown'))) !!}
                                </p>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 mb-2 d-flex align-items-center justify-content-around">
                            <a href="#"
                                class="btn btn-outline-secondary d-flex justify-content-center align-items-center form-control"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $booking->id }}">
                                Explore&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </a>
                            <div class="modal fade" id="staticBackdrop{{ $booking->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdrop{{ $booking->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <x-form-input name="startDate" label="Start Date" type="date"
                                                        value="{{ $booking->start_date }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="endDate" label="End Date" type="date"
                                                        value="{{ $booking->end_date }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="service" label="Service" type="text"
                                                        value="{{ $booking->service->name }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="origin" label="Origin" type="text"
                                                        value="{{ $booking->origin }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="destination" label="Destination" type="text"
                                                        value="{{ $booking->destination }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="persons" label="Persons" type="number"
                                                        value="{{ $booking->person }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="hotel" label="Hotel" type="text"
                                                        value="{{ $booking->hotel }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="coach" label="Coach" type="text"
                                                        value="{{ $booking->coach }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="shuttle" label="Shuttle" type="text"
                                                        value="{{ $booking->shuttle }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="price" label="Price" type="number"
                                                        value="{{ $booking->price }}" readonly autofocus />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination justify-content-center custom-pagination">
            {{ $bookings->links('pagination::bootstrap-4') }}
        </div>
    </div>




    <!-- here to-->
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('admin.layouts.footer')
@endsection
