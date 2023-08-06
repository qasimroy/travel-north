@extends('layouts.app')

@section('content')
    @include('admin.layouts.header')
    <h2 class="fs-2 m-0">Users</h2>
    </div>
    </nav>
    <div class="container-fluid p-4">
        <table class="table text-center bg-white rounded">
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
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">
                                <button class="btn btn-outline-success">
                                    Edit
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-outline-danger">
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
