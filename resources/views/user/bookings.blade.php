@extends('layouts.app')

@section('content')
        @include('user.layouts.header')
        <h2 class="fs-2 m-0">Bookings</h2>
    </div>
</nav>


<div class="container-fluid px-4">
    <div class="row my-2">
        <div class="d-flex justify-content-end">
            <a href="{{ route('user.bookings.create') }}">
                <button class="btn text-white cta ms-1" type="button" > Add <i class="fas fa-plus"></i></button>
            </a>
            <a href="{{ route('user.bookings.trash') }}">
                <button class="btn text-white btn-danger ms-1" type="button" >Trash <i class="fas fa-trash-alt"></i></button>
            </a>
        </div>
    </div>
    <table class="table bg-white rounded">
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
                <td class="w-10">{{ $booking->created_at }}</td>
                <td class="w-10">{{ $booking->origin }}</td>
                <td class="w-10">{{ $booking->destination }}</td>
                <td>{{ $booking->start_date }}</td>
                <td>{{ $booking->end_date }}</td>
                <td class="w-10">{{ $booking->service->name }}</td>
                <td>{{ $booking->price }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    @if ($booking->status === 'accepted')
                        <button type="button" class="btn cta text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $booking->serviceProvider->id }}">
                            Provider
                        </button>

                        <div class="modal fade" id="staticBackdrop{{ $booking->serviceProvider->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $booking->serviceProvider->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdrop{{ $booking->serviceProvider->id }}Label">Service Provider Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <x-form-input name="name" label="Company Name" value="{{ $booking->serviceProvider->name }}" type="text" readonly autofocus />
                                        <x-form-input name="address" label="Address" value="{{ $booking->serviceProvider->address }}" type="text" readonly autofocus />
                                        <x-form-input name="phone" label="Contact Number" value="{{ $booking->serviceProvider->phone }}" type="text" readonly autofocus />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('user.bookings.edit', $booking->id) }}"><button
                            class="btn btn-primary text-white">Edit <i class="fas fa-edit"></i></button></a>
                    
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Trash <i class="fas fa-trash-alt"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to trash this booking?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Trash <i class="fas fa-trash-alt"></i></button>
                                </form>
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