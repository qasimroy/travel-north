@extends('layouts.app')

@section('content')
<div class="container py-3 ">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6">
            <div class="card">
                <div class="card-header"><b>Register</b></div>

                <div class="card-body">
                    <x-form :action="route('register')">
                        <x-form-input name="name" label="Name" required autofocus />
                        <x-form-input name="email" label="Email" type="email" required />
                        <x-form-input name="cnic" label="CNIC" required />
                        <x-form-input name="phone" label="Phone" required />
                        <x-form-input name="address" label="Address" required/>
                        <x-form-input name="password" label="Password" type="password" required />
                        <x-form-input name="password_confirmation" label="Confirm Password" type="password" required />

                        <x-form-select label="Role" name="role" placeholder="Select Your Role" required>
                            @foreach ($roles as $role)
                            <option value={{ $role->id }}>{{ $role->name }}</option>
                            @endforeach
                        </x-form-select>

                        <x-form-submit>Register</x-form-submit>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection