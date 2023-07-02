@extends('layouts.app')

@section('content')
    <div class="container py-5 my-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-md-8">
                <div class="card">
                    <div class="card-header text-white primary-bg "><b>Login</b></div>
                    <div class="card-body">
                        <x-form :action="route('login')">
                            <x-form-input name="email" label="Email" type="email" required autofocus />
                            <x-form-input name="password" label="Password" type="password" required />

                            <x-form-checkbox name="remember" label="Remember Me" />

                            <x-form-submit>Login</x-form-submit>

                            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        @endif --}}
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
