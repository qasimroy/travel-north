@extends('layouts.app')

@section('content')
@include('user.layouts.header')
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
                                <button class="btn btn-success"data-bs-toggle="modal" data-bs-target="#servicesModal{{ $ServiceProvider->id }}">Show Services</button>
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
        <!-- Modals for Services -->
        @foreach ($serviceProvider as $ServiceProvider)
        <div class="modal fade mt-5 pt-5" id="servicesModal{{ $ServiceProvider->id }}" tabindex="-1" aria-labelledby="servicesModal{{ $ServiceProvider->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="servicesModal{{ $ServiceProvider->id }}Label">Services provided by {{ $ServiceProvider->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serviceCount = 1;
                                @endphp
                                
                                @foreach ($service as $service)
                                    <tr>
                                        <td>{{ $serviceCount }}</td>
                                        <td>{{ $service->service->name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>
                                            <a href="{{ route('user.service-providers.book') }}" class="btn btn-primary">Book</a>
                                        </td>
                                    </tr>
                                    @php
                                        $serviceCount++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



<!-- here to-->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- here -->
@include('user.layouts.footer')

@endsection