@extends('layouts.app')

@section('content')
@include('admin.layouts.header')
                <h2 class="fs-2 m-0">Bookings</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <div class="row float-end">
                <div class="">
                    <a>
                        <button class="btn text-white cta" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add</button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header text-dark">
                            <h5 class="offcanvas-title text-dark" id="offcanvasRightLabel">Book a Trip</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form class="row g-3 text-dark">
                                <div class="col-12">
                                  <x-form-select label="Service Provider" name="serviceProvider" placeholder="Select a Service Provider" required>
                                    <option value="">..</option>
                                  </x-form-select>
                                </div>
                                <div class="col-6">
                                  <x-form-input name="startDate" label="Start" type="date" required autofocus />
                                </div>
                                <div class="col-6">
                                  <x-form-input name="endDate" label="End" type="date" required autofocus />
                                </div>
                                <div class="col-md-6">
                                  <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                                    <option value="">..</option>
                                </x-form-select>
                                </div>
                                <div class="col-md-6">
                                  <x-form-select label="Destination" name="destination" placeholder="Select Your Destination" required>
                                    <option value="">..</option>
                                  </x-form-select>
                                </div>
                                <div class="col-md-6">
                                  <x-form-input name="passengers" label="Passengers" type="number" required autofocus />
                                </div>
                                <div class="col-md-6">
                                  <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel" >
                                    <option value="1">1 star</option>
                                    <option value="2">2 star</option>
                                    <option value="3">3 star</option>
                                    <option value="4">4 star</option>
                                    <option value="5">5 star</option>
                                  </x-form-select>
                                </div>
                                <div class="col-md-6">
                                  <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle" >
                                    <option value="1">Car</option>
                                    <option value="2">Bike</option>
                                  </x-form-select>
                                </div>
                                <div class="col-md-6">
                                  <x-form-select label="Coach" name="coach" placeholder="Select Coach" required>
                                  <option value="">Toyota Hiace</option>
                                  <option value="">Toyota Coaster</option>
                                  <option value="">Daewoo </option>
                                </x-form-select>
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
                                  <button type="submit" class="btn text-dark cta" >Book</button>
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
            <table class="table" id="wrapper">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Booking Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Passengers</th>
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
@include('admin.layouts.footer')

@endsection