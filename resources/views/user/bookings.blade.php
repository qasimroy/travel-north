@extends('layouts.app')

@section('content')
        @include('user.layouts.header')
        <h2 class="fs-2 m-0">Bookings</h2>
    </div>
</nav>


<div class="container-fluid px-4">
    <div class="row float-end my-2">
        <div class="">
            <a href="{{ route('user.bookings.create') }}">
                <button class="btn text-white cta" type="button" > Add <i class="fas fa-plus"></i></button>
            </a>
            <a href="{{ route('user.bookings.trash') }}">
                <button class="btn text-white btn-danger" type="button" >Trash <i class="fas fa-trash-alt"></i></button>
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
                    <a href="{{ route('user.bookings.edit', $booking->id) }}"><button
                            class="btn btn-primary text-white">Edit <i class="fas fa-edit"></i></button></a>
                    <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Trash <i class="fas fa-trash-alt"></i></button>
                    </form>
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
@include('user.layouts.footer')

@endsection