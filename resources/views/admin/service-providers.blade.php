@extends('layouts.app')

@section('content')
    @include('admin.layouts.header')
    <h2 class="fs-2 m-0">Service Providers</h2>
    </div>
    </nav>
    <div class="container-fluid p-4">
        <table class="table bg-white rounded mx-auto text-center">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($serviceProvider as $ServiceProvider)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $ServiceProvider->name }}</td>
                        <td>{{ $ServiceProvider->email }}</td>
                        <td>{{ $ServiceProvider->phone }}</td>
                        <td>{{ $ServiceProvider->address }}</td>
                        <td>
                            <a
                                href="{{ route('admin.service-providers.edit', ['ServiceProvider' => $ServiceProvider->id]) }}">
                                <button class="btn btn-outline-success">
                                    Edit
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger">
                                    Trash
                                </button>
                            </a>
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
