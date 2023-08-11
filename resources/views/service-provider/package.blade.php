@extends('layouts.app')

@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">
        Package</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <div class="row float-end">
            <div class="">
                <a href="{{ route('service-provider.package.create') }}">
                    <button class="btn text-white cta" type="button"> Create <i class="fas fa-plus"></i></button>
                </a>
            </div>
        </div><br><br>
        <div class="row d-flex justify-content-start">
            @foreach ($packages as $package)
                <div class="col-md-3 py-2 d-flex justify-content-center">
                    <div class="card shadow border-0 h-100 " style="width: 18.5rem;">
                        <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top image" alt="Package Image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $package->days }} Days trip from {{ $package->origin }} to
                                {{ $package->destination }}</h4>
                            <hr>
                            <p class="card-text">{{ $package->days }} Days & {{ $package->days - 1 }} Nights <br>
                                Rs. {{ $package->price }} <br>
                                Seats Remaining: {{ $package->seat - $package->persons_booked }}
                                @if ($package->status == 'Open')
                                    <h5 class="text-success">Open</h5>
                                @elseif ($package->status == 'Closed')
                                    <h5 class="text-danger">Closed</h5>
                                @endif
                            </p>
                            <div class="d-flex align-items-end justify-content-between">
                                <a type="button" href="{{ route('service-provider.package.explore', $package->id) }}"
                                    class="btn btn-outline-secondary d-flex align-items-center">
                                    Explore&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </a>
                                <a href="{{ route('service-provider.package.edit', $package->id) }}"
                                    class="btn btn-outline-success d-flex align-items-center">Edit&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                        <path d="m15 5 4 4" />
                                    </svg>
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Delete&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this package?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form
                                                    action="{{ route('service-provider.package.destroy', $package->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        Delete
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-trash-2">
                                                            <path d="M3 6h18" />
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17" />
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17" />
                                                        </svg>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div>



    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('service-provider.layouts.footer')
@endsection
