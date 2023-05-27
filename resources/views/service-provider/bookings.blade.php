@extends('layouts.app')

@section('content')
@include('service-provider.layouts.header')
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
                            <form class="row g-3 text-dark">
                                <div class="col-6">
                                  <label for="startDate" class="form-label">Start</label>
                                  <input type="date" class="form-control" id="startDate" placeholder="1234 Main St">
                                </div>
                                <div class="col-6">
                                  <label for="endDate" class="form-label">End</label>
                                  <input type="date" class="form-control" id="endDate" placeholder="1234 Main St">
                                </div>
                                <div class="col-12">
                                  <label for="inputAddress2" class="form-label">Address 2</label>
                                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputCity" class="form-label">From</label>
                                  <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputState" class="form-label">To</label>
                                  <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label for="inputZip" class="form-label">Passengers</label>
                                  <input type="text" class="form-control" id="inputZip">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputCity" class="form-label">Hotel</label>
                                  <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputState" class="form-label">Bike</label>
                                  <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-input s" id="inputZip">
                                  <label for="inputZip" class="form-label">Car</label>
                                </div>
                                <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button type="submit" class="btn text-white" style="background: #67dcb1;">Book</button>
                                </div>
                              </form>
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
@include('service-provider.layouts.footer')

@endsection