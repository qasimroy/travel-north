@extends('layouts.app')

@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">Package</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row float-end">
            <div class="">
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Create Package
                </button>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Package</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3 text-dark" action={{-- {{ "route('service-provider.services.store') }} --}}" method="POST">
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
                                        <x-form-input name="startDate" label="Start Date" type="date" required
                                            autofocus />
                                    </div>
                                    <div class="col-12">
                                        <x-form-input name="days" label="Days" type="number" required autofocus />
                                    </div>
                                    <div class="col-12">
                                        <x-form-input name="price" label="Price" type="number"
                                            placeholder="1000, 2000 etc" required autofocus />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary text-white">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('service-provider.layouts.footer')
@endsection
