@extends('layouts.app')

@section('content')
    @include('user.layouts.header')
    <h2 class="fs-2 m-0">Bookings</h2>
    </div>
    </nav>


    <div class="container-fluid px-4">
        <div class="row my-2 d-flex">
            <div class="d-flex justify-content-start w-50">
                <div class="d-flex justify-content-between w-100">
                    <div class="col-md-8">
                        <x-form-select label="" name="bookings" class="border-0">
                            <option value="all" selected>All Bookings</option>
                            <option value="pending">Pending Bookings</option>
                            <option value="accepted">Accepted Bookings</option>
                            <option value="rejected">Rejected Bookings</option>
                            <option value="completed">Completed Bookings</option>
                        </x-form-select>
                    </div>
                    <div class="">
                        <a href="{{ route('user.bookings.show') }}" class="btn btn-info text-white">Packaged Booking</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end w-50">
                <a href="{{ route('user.bookings.create') }}" class="text-decoration-none">
                    <button class="btn text-white cta ms-1 d-flex align-items-center" type="button"> Add&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                    </button>
                </a>
                <a href="{{ route('user.bookings.trash') }}" class="text-decoration-none">
                    <button class="btn text-white btn-danger ms-1 d-flex align-items-center" type="button">Trash&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-trash-2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                    </button>
                </a>
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
                            <b>Custom Booking Package {{ $count++ }}</b>
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
                            <button type="button" class="btn btn-outline-secondary d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $booking->id }}">
                                Explore&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </button>
                            <div class="modal fade" id="staticBackdrop{{ $booking->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="staticBackdrop{{ $booking->id }}Label" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdrop{{ $booking->id }}Label">Booking
                                                Details
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>Origin:</b> {{ $booking->origin }}</p>
                                            @if ($booking->destination != null)
                                                <p><b>Destination:</b> {{ $booking->destination }}</p>
                                            @endif
                                            <p><b>Starting on:</b> {{ $booking->start_date }}</p>
                                            <p><b>Ending on:</b> {{ $booking->end_date }}</p>
                                            <p>The Services Booked:
                                            <ul>
                                                @if ($booking->hotel != null)
                                                    <li>Luxury {{ $booking->hotel }} Hotel</li>
                                                @endif
                                                @if ($booking->coach != null)
                                                    <li>Comfortable {{ $booking->coach }} Coach</li>
                                                @endif
                                                @if ($booking->shuttle != null)
                                                    <li>{{ $booking->shuttle }} Shuttle Service</li>
                                                @endif
                                            </ul>
                                            </p>
                                            <p>Persons: {{ $booking->person }}</p>
                                            <p>Rs. {{ $booking->price }}</p>
                                            <p>Status: {!! $booking->status == 'pending'
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('user.bookings.edit', $booking->id) }}"
                                class="btn btn-outline-success d-flex align-items-center">Edit&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                    <path d="m15 5 4 4" />
                                </svg>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Trash <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to trash this booking?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('user.bookings.destroy', $booking->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Trash <i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($booking->status === 'accepted')
                                <button type="button" class="btn btn-outline-success form-control mt-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $booking->serviceProvider->id }}">
                                    View Provider Details
                                </button>

                                <div class="modal fade" id="staticBackdrop{{ $booking->serviceProvider->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdrop{{ $booking->serviceProvider->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="staticBackdrop{{ $booking->serviceProvider->id }}Label">
                                                    Service
                                                    Provider Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <x-form-input name="name" label="Company Name"
                                                    value="{{ $booking->serviceProvider->name }}" type="text" readonly
                                                    autofocus />
                                                <x-form-input name="address" label="Address"
                                                    value="{{ $booking->serviceProvider->address }}" type="text"
                                                    readonly autofocus />
                                                <x-form-input name="phone" label="Contact Number"
                                                    value="{{ $booking->serviceProvider->phone }}" type="text"
                                                    readonly autofocus />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
    @include('user.layouts.footer')
@endsection
