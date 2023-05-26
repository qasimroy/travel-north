@extends('layouts.app')
@section('content')
    @include('admin.layouts.header')
    <form class="row g-3 text-dark" action="{{ route('services.update', ['service' => $service]) }}" method="POST">
        @csrf
        <div class="col-12">
            <x-form-input name="name" label="Service Name" type="text" value="{{ $service->name }}" required autofocus />
        </div>
        <div class="col-12">
            <x-form-input name="price" label="Price" type="text" value="{{ $service->price }}" required autofocus />
        </div>
        <div class="col-12">
            <button type="submit" class="btn cta">Update</button>
        </div>
    </form>
@endsection