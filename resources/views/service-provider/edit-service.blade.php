@extends('layouts.app')
@section('content')
    @include('service-provider.layouts.header')
    <form class="row g-3 text-dark" action="{{ route('service-provider.services.update', ['serviceProviderServices' => $ServiceProviderServices]) }}" method="POST">
        @csrf
        <div class="col-12">
            <x-form-select label="Service Name" name="name" value="{{ $ServiceProviderServices->name }}" placeholder="Select Services" required>
                @foreach ($services as $Service)
                    <option value={{ $Service->id }}>{{ $Service->name }}</option>
                @endforeach
            </x-form-select>
        </div>
        <div class="col-12">
            <x-form-textarea name="description" label="Description" value="{{ $ServiceProviderServices->description }}" required autofocus />
        </div>
        <div class="col-12">
            <x-form-input name="price" label="Price" type="text" value="{{ $ServiceProviderServices->price }}" required autofocus />
        </div>
        <div class="col-12">
            <button type="submit" class="btn cta">Update</button>
        </div>
    </form>
@endsection