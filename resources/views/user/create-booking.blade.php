@extends('layouts.app')
@section('content')
@include('service-provider.layouts.header')
<h2 class="fs-2 m-0">Create Booking</h2>
</div>
</nav>
<div class="container d-flex justify-content-center">
    <div class="w-50 p-5 bg-white rounded">
        <form class="row g-3 text-dark" method="POST"
            action="{{ route('user.bookings.store') }}">
            @csrf
            <div class="col-md-6">
                <x-form-input name="startDate" label="Start" type="date" id="start" required
                    autofocus />
            </div>
            <div class="col-md-6">
                <x-form-input name="endDate" label="End" type="date" id="end" required
                    autofocus />
            </div>
            <div class="col-12">
                <x-form-select label="Service" name="service_id" placeholder="" id="service_id" required>
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </x-form-select>
            </div>
            <div class="col-12">
                <x-form-select label="Service Provider" name="service_provider_id"
                    placeholder="Select Service Providers" required>
                </x-form-select>
            </div>
            <div class="col-md-12">
                <label for="origin">Origin</label>
                <input type="text" id="origin" name="origin" class="form-control" placeholder="Enter your origin" required>
                <div id="autocomplete-results"></div>
            </div>
            <div class="col-12" id="service-details">
                <div class="d-none row" id="tour">
                    <div class="col-md-6">
                        <x-form-select label="Destination" name="destination" id="to" placeholder="Select Your Destination"
                            required>
                            @foreach($cities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="col-md-6">
                        <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel">
                            <option value="1 star">1 star</option>
                            <option value="2 star">2 star</option>
                            <option value="3 star">3 star</option>
                            <option value="4 star">4 star</option>
                            <option value="5 star">5 star</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-6">
                        <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle">
                            <option value="Car">Car</option>
                            <option value="Bike">Bike</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-6">
                        <x-form-select label="Coach" name="coach" placeholder="Select Coach">
                            <option value="Toyota Hiace">Toyota Hiace</option>
                            <option value="Toyota Coaster">Toyota Coaster</option>
                            <option value="Daewoo">Daewoo</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="d-none row" id="coach">
                    <div class="col-md-6">
                        <x-form-select label="Destination" name="destination" id="to" placeholder="Select Your Destination"
                            required>
                            @foreach($cities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="col-md-6">
                        <x-form-select label="Coach" name="coach" placeholder="Select Coach">
                            <option value="Toyota Hiace">Toyota Hiace</option>
                            <option value="Toyota Coaster">Toyota Coaster</option>
                            <option value="Daewoo">Daewoo</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="d-none row" id="hotel">
                    <div class="col-md-12">
                        <x-form-select label="Hotel" name="hotel" placeholder="Select Hotel">
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
                            <x-form-select label="Shuttle" name="shuttle" placeholder="Select Shuttle">
                                <option value="Car">Car</option>
                                <option value="Bike">Bike</option>
                            </x-form-select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <x-form-input name="persons" label="Persons" type="number" id="persons" required />
            </div>
            <div class="col-md-6">
                <x-form-input name="price" label="Price" type="number" value="" id="price-input" readonly required />
            </div>
            <div class="col-md-6">
                <input type="button" value="Calculate Price" class="btn btn-info" id="calculate-price">
            </div>
            <div class="col-12">
                <x-form-submit class=" text-white">Create</x-form-submit>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
@endsection