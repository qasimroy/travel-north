@extends('layouts.app')

@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">Create Package</h2>
    </div>
    </nav>
    <div class="ms-3">
        <div class="row float-start">
            <a href="{{ route('service-provider.package') }}">
                <button class="btn text-white cta rounded-circle" type="button"><i class="fas fa-arrow-left"></i></button>
            </a>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="w-50 p-5 bg-white rounded">
            <form class="row g-3 text-dark" method="POST"
                action="{{ route('service-provider.package.update', $package->id) }}" id="booking-form"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">

                    <x-form-input name="startDate" label="Start Date" type="date" value="{{ $package->start_date }}"
                        min="{{ date('Y-m-d') }}" required autofocus />
                </div>
                <div class="col-md-6">
                    <x-form-input name="endDate" label="End Date" type="date" value="{{ $package->end_date }}"
                        min="{{ date('Y-m-d') }}" required autofocus />
                </div>
                <div class="col-md-6">
                    <x-form-input name="days" label="Days" type="number" value="{{ $package->days }}" required
                        autofocus />
                </div>
                <div class="col-12">
                    <x-form-select label="Service" name="service_id" placeholder="" id="service_id" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->service->id }}">{{ $service->service->name }}</option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="col-md-6">
                    <label for="origin">Origin</label>
                    <input type="text" name="origin" class="form-control" value="{{ $package->origin }}" required>
                </div>
                <div class="col-md-6" id="destination-field">
                    <label for="destination">Destination</label>
                    <input type="text" name="destination" class="form-control" value="{{ $package->destination }}"
                        required>
                </div>
                <div class="col-12" id="service-details">
                    <div class="d-none row" id="tour">
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
                                <option value="Changan Caravan">Changan Caravan</option>
                                <option value="Toyota Hiace">Toyota Hiace</option>
                                <option value="Toyota Coaster">Toyota Coaster</option>
                                <option value="Daewoo">Daewoo</option>
                            </x-form-select>
                        </div>
                    </div>
                    <div class="d-none row" id="coach">
                        <div class="col-md-6">
                            <x-form-select label="Coach" name="coach" placeholder="Select Coach">
                                <option value="Changan Caravan">Changan Caravan</option>
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
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control"
                        value="{{ URL::asset('storage/' . $package->image) }}" accept="image/*" required>
                </div>
                <div class="col-md-6">
                    <x-form-input name="price" label="Price" type="number" value="{{ $package->price }}"
                        required />
                </div>
                <div class="col-12">
                    <x-form-submit class=" text-white">Update</x-form-submit>
                </div>
            </form>
        </div>
    </div>



    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('service-provider.layouts.footer')
@endsection
