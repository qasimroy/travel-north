@extends('layouts.app')

@section('content')
@include('layouts.header')
                <h2 class="fs-2 m-0">Bookings</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <div class="row float-end">
                <div class="">
                    <a href="#">
                        <button class="btn text-white" type="button" data-bs-toggle="offcanvas" style="background: #67dcb1; " data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add</button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header text-dark">
                            <h5 class="offcanvas-title text-dark" id="offcanvasRightLabel">Book a Trip</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            ...
                        </div>
                        </div>
                        
                    </a>
                    <a href="#">
                        <button class="btn btn-danger d-inline-block m-2">Go to Trash</button>
                    </a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Booking Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $count = 1;
                    @endphp
                    @foreach ($user as $u)
                        <tr>
                            <td>{{{ $count }}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><button class="btn btn-danger">Trash</button></a>
                                <a href=""><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach --}}
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
@include('layouts.footer')

@endsection