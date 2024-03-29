@extends('layouts.app')

@section('content')
    @include('admin.layouts.header')
    <h2 class="fs-2 m-0">User Edit</h2>
    </div>
    </nav>
    <div class="container-fluid px-4">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            <div class="container w-75 pt-5">
                <div class="row bg-white p-5 rounded">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <x-form-input name="name" label="Name" type="text" value="{{ $user->name }}" required
                            autofocus />
                        <x-form-input name="email" label="Email" type="email" value="{{ $user->email }}" required
                            autofocus />
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <x-form-input name="cnic" label="CNIC" type="number" value="{{ $user->cnic }}" required
                            autofocus />
                        <x-form-input name="phone" label="Phone" type="tel" value="{{ $user->phone }}" required
                            autofocus />
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <x-form-input name="address" label="Address" type="text" value="{{ $user->address }}" required
                            autofocus />
                    </div>
                    <div class="form-group mt-2 ">
                        <input type="submit" value="Submit" name="submit" id="" class="btn cta">
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- here to-->
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <!-- here -->
    @include('admin.layouts.footer')
@endsection
