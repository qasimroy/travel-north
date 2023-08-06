@extends('layouts.app')

@section('content')
    @include('user.layouts.header')
    <h2 class="fs-2 m-0">Package Booking</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row d-flex justify-content-start">
            @foreach ($packageBookings as $packageBooking)
                <div class="col-md-3 py-2">
                    <div class="card shadow border-0 h-100 b-radius" style="width: 18.5rem;">
                        <img src="{{ asset('storage/' . $packageBooking->package->image) }}" class="card-img-top image"
                            alt="Package Image" loading="lazy">
                        <div class="card-body">
                            <h4 class="card-title">{{ $packageBooking->package->days }} Days trip from
                                {{ $packageBooking->package->origin }} to
                                {{ $packageBooking->package->destination }}</h4>
                            <hr>
                            <p class="card-text">{{ $packageBooking->package->days }} Days &
                                {{ $packageBooking->package->days - 1 }} Nights <br>
                                Persons: {{ $packageBooking->persons }} <br>
                                Rs. {{ $packageBooking->package->price * $packageBooking->persons }} <br>
                                @if ($packageBooking->status == 'pending')
                                    <h5 class="text-secondary">Pending</h5>
                                @elseif ($packageBooking->status == 'accepted')
                                    <h5 class="text-success">Accepted</h5>
                                @elseif ($packageBooking->status == 'rejected')
                                    <h5 class="text-danger">Rejected</h5>
                                @elseif ($packageBooking->status == 'completed')
                                    <h5 class="text-success">Completed</h5>
                                @endif
                            </p>
                            <div class="d-flex align-items-end justify-content-between">
                                <button
                                    class="btn btn-outline-secondary d-flex justify-content-center align-items-center form-control"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $packageBooking->id }}">
                                    Explore&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </button>


                                <div class="modal fade" id="staticBackdrop{{ $packageBooking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="staticBackdrop{{ $packageBooking->id }}Label"
                                    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdrop{{ $packageBooking->id }}Label">
                                                    Package
                                                    Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <p>We are providing a tour plan for {{ $packageBooking->package->days }}
                                                    days from
                                                    <b>{{ $packageBooking->package->origin }}</b> to
                                                    <b>{{ $packageBooking->package->destination }}</b>
                                                    which will start on {{ $packageBooking->package->start_date }} and
                                                    will
                                                    end on
                                                    {{ $packageBooking->package->end_date }}.
                                                </p>
                                                <p>The services we are providing are:
                                                <ul>
                                                    <li>Luxury {{ $packageBooking->package->hotel }} Hotel</li>
                                                    <li>Comfortable {{ $packageBooking->package->coach }} Coach</li>
                                                    @if ($packageBooking->package->shuttle != null)
                                                        <li>{{ $packageBooking->package->shuttle }} Shuttle Service</li>
                                                    @endif
                                                </ul>
                                                </p>
                                                <p>{{ $packageBooking->package->days }} Days &
                                                    {{ $packageBooking->package->days - 1 }} Nights</p>
                                                <p>Rs. {{ $packageBooking->package->price * $packageBooking->persons }}</p>
                                                <p>Status: @if ($packageBooking->status == 'pending')
                                                        <b class="text-secondary">Pending</b>
                                                    @elseif ($packageBooking->status == 'accepted')
                                                        <b class="text-success">Accepted</b>
                                                    @elseif ($packageBooking->status == 'rejected')
                                                        <b class="text-danger">Rejected</b>
                                                    @elseif ($packageBooking->status == 'completed')
                                                        <b class="text-success">Completed</b>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('user.layouts.footer')
@endsection
