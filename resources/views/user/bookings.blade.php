@extends('layouts.app')

@section('content')
@include('user.layouts.header')
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
                          <div class="col-6">
                            <x-form-input name="startDate" label="Start" type="date" required autofocus />
                          </div>
                          <div class="col-6">
                            <x-form-input name="endDate" label="End" type="date" required autofocus />
                          </div>
                          <div class="col-12">
                            <x-form-select label="Service" name="service_id" placeholder="Select Services" required>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </x-form-select>
                          </div>
                          <div class="col-12">
                            <x-form-select label="Service Provider" name="service_provider_id" placeholder="Select Service Providers" required>
                            </x-form-select>
                          </div>
                          <div class="col-12" id="service-details">
                            <div class="d-none" id="tour">
                              @include('user.serviceForm.tour')
                            </div>
                            <div class="d-none" id="coach">
                              @include('user.serviceForm.coach')
                            </div>
                            <div class="d-none" id="hotel">
                              @include('user.serviceForm.hotel')
                            </div>
                            <div class="d-none" id="shuttle">
                              @include('user.serviceForm.shuttle')
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
@include('user.layouts.footer')

@endsection