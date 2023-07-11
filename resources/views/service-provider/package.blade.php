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
        <div class="row d-flex justify-content-between">
            @foreach ($packages as $package)
                <div class="col-md-3 py-2">
                    <div class="card shadow border-0 h-100" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top image" alt="Package Image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $package->days }} Days trip from {{ $package->origin }} to
                                {{ $package->destination }}</h4>
                            <hr>
                            <p class="card-text">{{ $package->days }} Days & {{ $package->days - 1 }} Nights <br>
                                Rs. {{ $package->price }} <br>
                                @if ($package->status == 'Open')
                                    <h5 class="text-success">Open</h5>
                                @elseif ($package->status == 'Closed')
                                    <h5 class="text-danger">Closed</h5>
                                @endif
                            </p>
                            <div class="d-flex align-items-end justify-content-between">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $package->id }}">
                                    Explore <i class="fas fa-search"></i>
                                </button>
                                <a href="{{ route('service-provider.package.edit', $package->id) }}"
                                    class="btn btn-outline-success">Edit
                                    <i class="fas fa-edit"></i></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Delete <i class="fas fa-trash"></i>
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
                                                    <button type="submit" class="btn btn-outline-danger">Delete
                                                        <i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal fade" id="staticBackdrop{{ $package->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="staticBackdrop{{ $package->id }}Label"
                                    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdrop{{ $package->id }}Label">Package
                                                    Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <p>We are providing a tour plan for {{ $package->days }} days from
                                                    <b>{{ $package->origin }}</b> to <b>{{ $package->destination }}</b>
                                                    which will start on {{ $package->start_date }} and will end on
                                                    {{ $package->end_date }}.
                                                </p>
                                                <p>The services we are providing are:
                                                <ul>
                                                    <li>Luxury {{ $package->hotel }} Hotel</li>
                                                    <li>Comfortable {{ $package->coach }} Coach</li>
                                                    @if ($package->shuttle != null)
                                                        <li>{{ $package->shuttle }} Shuttle Service</li>
                                                    @endif
                                                </ul>
                                                </p>
                                                <p>{{ $package->days }} Days & {{ $package->days - 1 }} Nights</p>
                                                <p>Rs. {{ $package->price }}</p>
                                                <p>Status: @if ($package->status == 'Open')
                                                        <b class="text-success">Open</b>
                                                    @elseif ($package->status == 'Closed')
                                                        <b class="text-danger">Closed</b>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

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
