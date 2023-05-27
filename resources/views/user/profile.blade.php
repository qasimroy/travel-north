@extends('layouts.app')

@section('content')
@include('user.layouts.header')
                <h2 class="fs-2 m-0">Profile</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <form action="{{ route('user.profile.update',['profile' => $user->id]) }} " method="POST">
                @csrf
                <div class="container w-75 pt-5">
                    <div class="row bg-white p-5 rounded">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <x-form-input name="name" label="Name" type="text" value="{{ $user->name }}" required autofocus />
                            <x-form-input name="email" label="Email" type="email" value="{{ $user->email }}" required autofocus />
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <x-form-input name="password" label="Password" type="password"  required autofocus />
                            <x-form-input name="confirm_password" label="Confirm Password" type="password"  required autofocus />
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
@include('user.layouts.footer')

@endsection