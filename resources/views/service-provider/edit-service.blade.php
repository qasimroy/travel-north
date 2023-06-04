@extends('layouts.app')
@section('content')
@include('service-provider.layouts.header')
<h2 class="fs-2 m-0">Edit Service</h2>
</div>
</nav>
<div class="container d-flex justify-content-center">
    <div class="w-50 p-5 bg-white rounded">
        <form class="row g-3 text-dark"
            action="{{ route('service-provider.services.update', ['serviceProviderServices' => $serviceProviderServices]) }}"
            method="POST">
            @csrf
            <div class="col-12">
                <x-form-select label="Service Name" name="service_id" placeholder="Select Services" required>
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $serviceProviderServices->service_id === $service->id ?
                        'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required
                    autofocus>{{ $serviceProviderServices->description }}</textarea>
            </div>
            <div class="col-12">
                <x-form-input name="price" label="Price" type="text" value="{{ $serviceProviderServices->price }}"
                    required autofocus />
            </div>
            <div class="col-12">
                <button type="submit" class="btn cta">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
@endsection