@extends('layouts.app')

@section('content')
@include('service-provider.layouts.header')
                <h2 class="fs-2 m-0">Bookings</h2>
            </div>
        </nav>
        <div class="container-fluid p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Booking Date</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Selected Service</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{{ $count }}}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->origin }}</td>
                        <td>{{ $booking->destination }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->service->name }}</td>
                        <td>{{ $booking->price }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Explore
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
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
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @if ($booking->status === 'pending')
                                            <form action="{{ route('service-provider.bookings.accept', ['id' => $booking]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                            </form>
                                            <form action="{{ route('service-provider.bookings.reject', ['id' => $booking]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </form>
                                        @elseif ($booking->status === 'accepted')
                                            <form action="{{ route('service-provider.bookings.complete', ['id' => $booking]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Complete</button>
                                            </form>
                                        @endif
                                        <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center custom-pagination">
                {{-- {{ $user->links('pagination::bootstrap-4') }} --}}
            </div>

        </div>
        



<!-- here to-->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- here -->
@include('service-provider.layouts.footer')

@endsection