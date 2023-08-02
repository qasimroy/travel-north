@extends('layouts.app')

@section('content')
    @include('user.layouts.header')
    <h2 class="fs-2 m-0">Bookings</h2>
    </div>
    </nav>


    <div class="container-fluid px-4">
        {{-- <div class="row float-end py-2">
            <div class="">
                <a href="{{ route('user.bookings') }}">
                    <button class="btn text-white cta" type="button">Bookings <i class="fas fa-book"></i></button>
                </a>
            </div>
        </div> --}}
        <div class="row my-2 d-flex">
            <div class="d-flex justify-content-end w-100">
                <div class="">
                    <a href="{{ route('user.bookings') }}">
                        <button class="btn text-white cta" type="button">Bookings <i class="fas fa-book"></i></button>
                    </a>
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
                            <a href="{{ route('user.bookings.restore', $booking->id) }}">
                                <button class="btn btn-outline-success">
                                    Restore <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-archive-restore">
                                        <rect width="20" height="5" x="2" y="4" rx="2" />
                                        <path d="M12 13v7" />
                                        <path d="m9 16 3-3 3 3" />
                                        <path d="M4 9v9a2 2 0 0 0 2 2h2" />
                                        <path d="M20 9v9a2 2 0 0 1-2 2h-2" />
                                    </svg>
                                </button>
                            </a>
                            <form action="{{ route('user.bookings.trash.delete', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
    @include('user.layouts.footer')
@endsection
