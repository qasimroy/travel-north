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
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top image" alt="Package Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->origin }} to {{ $package->destination }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
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
