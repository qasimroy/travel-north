@extends('layouts.app')

@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">Service</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row float-end">
            <div class="">
                <button class="btn text-white cta" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">Add</button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header text-dark">
                        <h5 class="offcanvas-title text-dark" id="offcanvasRightLabel">Add a Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="row g-3 text-dark" action="{{ route('service-provider.services.store') }}"
                            method="POST">
                            @csrf
                            <div class="col-12">
                                <x-form-select label="Service Name" name="service_id" placeholder="Select Services"
                                    required>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col-12">
                                <x-form-textarea name="description" label="Description" required autofocus />
                            </div>
                            <div class="col-12">
                                <x-form-input name="price" label="Price" type="number" placeholder="1000, 2000 etc"
                                    required autofocus />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn cta">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Service Name</th>
                    <th>Service Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($serviceProviderServices as $serviceProviderServices)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $serviceProviderServices->service->name }}</td>
                        <td class="w-50">{{ $serviceProviderServices->description }}</td>
                        <td>{{ $serviceProviderServices->price }}</td>
                        <td>
                            <a href="{{ route('service-provider.services.edit', $serviceProviderServices->id) }}"><button
                                    class="btn btn-primary">Edit</button></a>
                            <form action="{{ route('service-provider.services.destroy', $serviceProviderServices->id) }}"
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
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('service-provider.layouts.footer')
@endsection
