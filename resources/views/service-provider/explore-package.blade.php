@extends('layouts.app')
@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">Explore Package</h2>
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
                                <div class="col-md-6 mt-4 p-2 bg-light border border-dark rounded">
                                    <div class="container">
                                        <h4 class="text-center">Package Details:</h4>
                                        <hr>
                                        <table class="table">
                                            <tr>
                                                <td><b>Origin:</b></td>
                                                <td>{{ $package->origin }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Destination:</b></td>
                                                <td>{{ $package->destination }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Starting on:</b></td>
                                                <td>{{ $package->start_date }} Till {{ $package->end_date }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Days:</b></td>
                                                <td>{{ $package->days }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Seats:</b></td>
                                                <td>{{ $package->seat }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Seats Booked:</b></td>
                                                <td>{{ $package->persons_booked }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Seats Remaining:</b></td>
                                                <td>{{ $package->seat - $package->persons_booked }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
@endsection
