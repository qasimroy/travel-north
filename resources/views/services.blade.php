@extends('layouts.app')

@section('content')
@include('layouts.header')
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
                            <form class="row g-3 text-dark">
                                <div class="col-12">
                                    <x-form-select label="Select a Service" name="service" placeholder="Select a Service" required>
                                        @foreach ($service as $services)
                                        <option value="">{{ $services }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn cta">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="#">
                        <button class="btn btn-danger d-inline-block m-2">Go to Trash</button>
                    </a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $count = 1;
                    @endphp
                    @foreach ($user as $u)
                        <tr>
                            <td>{{{ $count }}}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><button class="btn btn-danger">Trash</button></a>
                                <a href=""><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        



<!-- here to-->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- here -->
@include('layouts.footer')

@endsection