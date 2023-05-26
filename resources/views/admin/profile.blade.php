@extends('admin.layouts.app')

@section('content')
@include('admin.layouts.header')
                <h2 class="fs-2 m-0">Profile</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <form action="{{-- {{$url}} --}}" method="POST">
                @csrf
                <div class="container w-75 pt-5">
                    <div class="row">
                        {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                            <x-input type="text" name="name" label="Name" value="{{-- {{$user->name}} --}}{{-- "/> --}}
                            {{-- <x-input type="password" name="password" label="Password" />  value="{{ old('password') }}"  
                            {{-- </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <x-input type="text" name="email" label="Email"  value="{{$user->email}}"/>
                            <x-input type="password" name="confirm_password" label="Confirm Password" />
                        </div>--}}
                    </div> 
                    <div class="form-group mt-2 p-2 bg-white">
                        <input type="submit" value="Submit" name="submit" id="" class="btn cta">
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