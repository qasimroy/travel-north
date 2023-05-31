@extends('layouts.app')
@section('content')
    @include('admin.layouts.header')
            <h2 class="fs-2 m-0">Edit Service</h2>
        </div>
    </nav>
    <div class="container d-flex justify-content-center">
        <div class="w-50 p-5 bg-white rounded">
            <form class=" g-3 text-dark" action="{{ route('services.update', ['service' => $service]) }}" method="POST">
                @csrf
                <div class="col-12 py-2">
                    <x-form-input name="name" label="Service Name" type="text" value="{{ $service->name }}" required autofocus />
                </div>
                <div class="col-12 py-2">
                    <x-form-input name="price" label="Price" type="text" value="{{ $service->price }}" required autofocus />
                </div>
                <div class="col-12 py-2">
                    <button type="submit" class="btn cta">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
</div>
@endsection