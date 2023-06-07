@extends('layouts.app')

@section('content')
@include('user.layouts.header')
                <h2 class="fs-2 m-0">Bookings</h2>
            </div>
        </nav>

        @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
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
                      <form class="row g-3 text-dark" method="POST" action="{{ route('user.bookings.store') }}">
                        @csrf
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
                                <div class="d-none row" id="tour">
                                    <div class="col-md-6">
                                        <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-select label="Destination" name="destination" placeholder="Select Your Destination" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-input name="person" label="Persons" type="number" required  />
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
                                        <x-form-select label="Coach" name="coach" placeholder="Select Coach" >
                                        <option value="Toyota Hiace">Toyota Hiace</option>
                                        <option value="Toyota Coaster">Toyota Coaster</option>
                                        <option value="Daewoo">Daewoo</option>
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="d-none row" id="coach">
                                    <div class="col-md-6">
                                        <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-select label="Destination" name="destination" placeholder="Select Your Destination" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-input name="person" label="Persons" type="number" required autofocus />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-select label="Coach" name="coach" placeholder="Select Coach" >
                                        <option value="Toyota Hiace">Toyota Hiace</option>
                                        <option value="Toyota Coaster">Toyota Coaster</option>
                                        <option value="Daewoo">Daewoo</option>
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="d-none row" id="hotel">
                                    <div class="col-md-12">
                                        <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-input name="person" label="Persons" type="number" required autofocus />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel" >
                                            <option value="1 star">1 star</option>
                                            <option value="2 star">2 star</option>
                                            <option value="3 star">3 star</option>
                                            <option value="4 star">4 star</option>
                                            <option value="5 star">5 star</option>
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="d-none row" id="shuttle">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <x-form-select label="Origin" name="origin" placeholder="Select Your Origin" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-input name="person" label="Persons" type="number" required autofocus />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle" >
                                            <option value="car">Car</option>
                                            <option value="bike">Bike</option>
                                        </x-form-select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <x-form-submit>Book</x-form-submit>
                            </div>
                        </form>
                      </div>
                    </div>
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
                                <a href="{{ route('user.bookings.edit', $booking->id) }}"><button class="btn btn-primary">Edit</button></a>
                                <form action="{{ route('user.bookings.destroy', $booking->id) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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