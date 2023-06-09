@extends('layouts.app')

@section('content')
@include('admin.layouts.header')
    <h2 class="fs-2 m-0">Service</h2>
</div>
</nav>
<div class="container-fluid px-4">
    <div class="row float-end">
        <div class="">
            <button class="btn text-white" type="button" data-bs-toggle="offcanvas" style="background: #67dcb1; " data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add</button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header text-dark">
                    <h5 class="offcanvas-title text-dark" id="offcanvasRightLabel">Add a Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form class="row g-3 text-dark" action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <x-form-input name="name" label="Service Name" type="text" placeholder="" required autofocus />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn cta">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Service Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($services as $service)
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $service->name }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}"><button class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- here -->
@include('admin.layouts.footer')

@endsection
