@extends('layouts.app')

@section('content')
    @include('admin.layouts.header')
    <h2 class="fs-2 m-0">Service</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-end my-2">
            <div class="">
                <button class="btn text-white cta" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">Add <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg></button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header text-dark">
                        <h5 class="offcanvas-title text-dark" id="offcanvasRightLabel">Add a Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form class="row g-3 text-dark" action="{{ route('admin.services.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <x-form-input name="name" label="Service Name" type="text" placeholder="" required
                                    autofocus />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn cta">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table bg-white rounded text-center">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Service Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $service->name }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.services.edit', $service->id) }}">
                                <button class="btn btn-outline-success mx-1">Edit&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                        <path d="m15 5 4 4" />
                                    </svg>
                                </button>
                            </a>
                            <button type="button" class="btn btn-outline-danger d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this service?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-danger d-flex align-items-center">
                                                    Delete <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" class="lucide lucide-trash-2">
                                                        <path d="M3 6h18" />
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                        <line x1="10" x2="10" y1="11"
                                                            y2="17" />
                                                        <line x1="14" x2="14" y1="11"
                                                            y2="17" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    @include('admin.layouts.footer')
@endsection
