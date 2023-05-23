@extends('layouts.app')

@section('content')
@include('layouts.header')
                <h2 class="fs-2 m-0">Service Providers</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Service Name</th>
                        <th>Type</th>
                        <th>Price</th>
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