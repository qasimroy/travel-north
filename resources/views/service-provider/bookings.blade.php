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
                            <a href="{{ route('service-provider.booking.show', ['id' => $booking->id]) }}">
                                <button type="button" class="btn btn-primary" >
                                    Explore
                                </button>
                            </a>
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