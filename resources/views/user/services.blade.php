@extends('layouts.app')

@section('content')
@include('user.layouts.header')
    <h2 class="fs-2 m-0">Service</h2>
</div>
</nav>
<div class="container-fluid p-4">
    <table class="table">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Service Name</th>
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
@include('user.layouts.footer')

@endsection
