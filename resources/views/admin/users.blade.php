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
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                class="mx-1 text-decoration-none">
                                <button class="btn btn-outline-success d-flex align-items-center">
                                    Edit&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-pencil">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                        <path d="m15 5 4 4" />
                                    </svg>
                                </button>
                            </a>
                            <button class="btn btn-outline-danger d-flex align-items-center" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Trash <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Service Provider
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to Delete this User?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">
                                                    Trash <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" class="lucide lucide-trash-2">
                                                        <path d="M3 6h18" />
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                        <line x1="10" x2="10" y1="11" y2="17" />
                                                        <line x1="14" x2="14" y1="11" y2="17" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
