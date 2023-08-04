@extends('layouts.app')
@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">
        Explore Package</h2>
    </div>
    </nav>
    <div class="container ">
        <div class="row">
            <div class="col-12 py-2 color">
                <div class="container d-flex justify-content-center">
                    <div class="d-flex justify-content-center w-25 text-center" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active flex-fill" id="list-home-list"
                            data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Details</a>
                        &nbsp;
                        <a class="list-group-item list-group-item-action flex-fill " id="list-profile-list"
                            data-bs-toggle="list" href="#list-profile" role="tab"
                            aria-controls="list-profile">Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6  mt-4">
                                    <img src="{{ asset('storage/' . $package->image) }}" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div class="col-md-6 mt-4 p-2 bg-light border rounded">
                                    <div class="container">
                                        <h4 class="text-center">Package Details:</h4>
                                        <hr>
                                        <table class="table">
                                            <tr>
                                                <td><b>Origin:</b></td>
                                                <td>{{ $package->origin }}</td>
                                                <td><b>Destination:</b></td>
                                                <td>{{ $package->destination }}</td>
                                            </tr>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td><b>Starting on:</b></td>
                                                <td>{{ $package->start_date }} Till {{ $package->end_date }}</td>
                                                <td><b>Days:</b></td>
                                                <td>{{ $package->days }}</td>
                                            </tr>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td><b>Total Seats:</b></td>
                                                <td>{{ $package->seat }}</td>
                                                <td><b>Price:</b></td>
                                                <td>{{ $package->price }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Seats Booked:</b></td>
                                                <td>{{ $package->persons_booked }}</td>
                                                <td><b>Status:</b></td>
                                                <td>
                                                    @if ($package->status == 'Open')
                                                        <b class="text-success">Open</b>
                                                    @elseif ($package->status == 'Closed')
                                                        <b class="text-danger">Closed</b>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Seats Remaining:</b></td>
                                                <td>{{ $package->seat - $package->persons_booked }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Services: </b></td>
                                                <td>
                                                    <ul>
                                                        @if ($package->hotel != null)
                                                            <li>Luxury {{ $package->hotel }} Hotel</li>
                                                        @endif
                                                        @if ($package->coach != null)
                                                            <li>Comfortable {{ $package->coach }} Coach</li>
                                                        @endif
                                                        @if ($package->shuttle != null)
                                                            <li>{{ $package->shuttle }} Shuttle Service</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="container ">
                            <div class="row mt-4 p-2 px-3">
                                <table class="table bg-light rounded text-center">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Persons</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($packageBookings as $packageBooking)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $packageBooking->user->name }}</td>
                                                <td>{{ $packageBooking->user->email }}</td>
                                                <td>{{ $packageBooking->user->phone }}</td>
                                                <td>{{ $packageBooking->persons }}</td>
                                                <td>{{ $packageBooking->package->price * $packageBooking->persons }}</td>
                                                @if ($packageBooking->status == 'pending')
                                                    <td class="text-secondary">Pending</td>
                                                @elseif ($packageBooking->status == 'accepted')
                                                    <td class="text-success">Accepted</td>
                                                @elseif ($packageBooking->status == 'rejected')
                                                    <td class="text-danger">Rejected</td>
                                                @elseif ($packageBooking->status == 'completed')
                                                    <td class="text-success">Completed</td>
                                                @endif
                                                <td>
                                                    @if ($packageBooking->status == 'pending')
                                                        <a href="#" type="button"
                                                            class="btn btn-outline-success rounded-pill"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="accept-tooltip" data-bs-title="Accept">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="1"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-check">
                                                                <polyline points="20 6 9 17 4 12" />
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="btn btn-outline-danger rounded-pill"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="reject-tooltip" data-bs-title="Reject">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="1"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-x">
                                                                <path d="M18 6 6 18" />
                                                                <path d="m6 6 12 12" />
                                                            </svg>
                                                        </a>
                                                    @elseif ($packageBooking->status == 'accepted')
                                                        <a href="#" class="btn btn-outline-success rounded-pill"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="accept-tooltip" data-bs-title="Complete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="1"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-check-check">
                                                                <path d="M18 6 7 17l-5-5" />
                                                                <path d="m22 10-7.5 7.5L13 16" />
                                                            </svg>
                                                        </a>
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
@endsection
