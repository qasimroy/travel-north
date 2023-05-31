@extends('layouts.app')

@section('content')
@include('admin.layouts.header')
                <h2 class="fs-2 m-0">Service Providers</h2>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone no</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($serviceProvider as $ServiceProvider)
                        <tr>
                            <td>{{{ $count }}}</td>
                            <td>{{ $ServiceProvider->name }}</td>
                            <td>{{ $ServiceProvider->email }}</td>
                            <td>{{ $ServiceProvider->phone }}</td>
                            <td>{{ $ServiceProvider->address }}</td>
                            <td>
                                <a href=""><button class="btn btn-danger">Trash</button></a>
                                <a href=""><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center custom-pagination">
                {{-- {{ $user->links('pagination::bootstrap-4') }} --}}
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