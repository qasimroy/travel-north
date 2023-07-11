@extends('layouts.app')

@section('content')
    @include('service-provider.layouts.header')
    <h2 class="fs-2 m-0">Package</h2>
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
        <div class="row d-flex justify-content-around">
            @foreach ($packages as $package)
                <div class="col-md-3">
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
                                <a href="#" class="btn btn-success">Explore <i class="fas fa-search"></i></a>
                                <a href="#" class="btn btn-primary text-white">Edit <i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger ">Delete <i class="fas fa-trash"></i></a>
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
