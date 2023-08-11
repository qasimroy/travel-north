@include('user.layouts.header')
<h2 class="fs-2 m-0">Dashboard</h2>
</div>
</nav>

<div class="container-fluid px-4">
    <div class="d-flex flex-wrap justify-content-start my-2">
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $bookingCount }}</h3>
                    <p class="fs-5">Bookings</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $pendingBookingCount }}</h3>
                    <p class="fs-5">Pending Bookings</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $acceptedBookingCount }}</h3>
                    <p class="fs-5">Accepted Bookings</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $rejectedBookingCount }}</h3>
                    <p class="fs-5">Rejected Bookings</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $completedBookingCount }}</h3>
                    <p class="fs-5">Completed Bookings</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $packageBookingCount }}</h3>
                    <p class="fs-5">Package Booking</p>
                </div>
                <i class="fas fa-book fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $packageCount }}</h3>
                    <p class="fs-5">Packages</p>
                </div>
                <i class="fas fa-gift fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $serviceCount }}</h3>
                    <p class="fs-5">Services</p>
                </div>
                <i class="fas fa-wrench fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class=" m-2">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-between align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $serviceProviderCount }}</h3>
                    <p class="fs-5">Service Providers</p>
                </div>
                <i class="fas fa-users fs-1 primary-text border ms-3 rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Bookings</h3>
        <div class="row">
            @php
                $count = 1;
            @endphp
            @foreach ($recentBookings as $recentBooking)
                <div class="col-md-3 my-2">
                    <div class="card shadow border-0 h-100">
                        <div class="card-header border-0">
                            <b>Custom Booking {{ $count++ }}</b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Origin</b>
                                <p>{{ $recentBooking->origin }}</p>
                                @if ($recentBooking->destination != null)
                                    <b>Destination </b>
                                    <p>{{ $recentBooking->destination }}</p>
                                @endif
                            </h5>
                            <hr>
                            <div class="card-text">
                                <p><b>Dated:</b> {{ $recentBooking->start_date }} till {{ $recentBooking->end_date }}
                                </p>
                                <p><b>Price:</b> {{ $recentBooking->price }}</p>
                                <p>{!! $recentBooking->status == 'pending'
                                    ? '<b class="text-secondary">Pending</b>'
                                    : ($recentBooking->status == 'accepted'
                                        ? '<b class="text-success">Accepted</b>'
                                        : ($recentBooking->status == 'rejected'
                                            ? '<b class="text-danger">Rejected</b>'
                                            : ($recentBooking->status == 'completed'
                                                ? '<b class="text-success">Completed</b>'
                                                : 'Unknown'))) !!}
                                </p>
                            </div>
                        </div>
                        <div
                            class="card-footer bg-white border-0 mb-2 d-flex align-items-center justify-content-around">
                            <a href="#"
                                class="btn btn-outline-secondary d-flex justify-content-center align-items-center form-control"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $recentBooking->id }}">
                                Explore&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </a>
                            <div class="modal fade" id="staticBackdrop{{ $recentBooking->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdrop{{ $recentBooking->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <x-form-input name="startDate" label="Start Date" type="date"
                                                        value="{{ $recentBooking->start_date }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="endDate" label="End Date" type="date"
                                                        value="{{ $recentBooking->end_date }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="service" label="Service" type="text"
                                                        value="{{ $recentBooking->service->name }}" readonly
                                                        autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="origin" label="Origin" type="text"
                                                        value="{{ $recentBooking->origin }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="destination" label="Destination"
                                                        type="text" value="{{ $recentBooking->destination }}"
                                                        readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="persons" label="Persons" type="number"
                                                        value="{{ $recentBooking->person }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="hotel" label="Hotel" type="text"
                                                        value="{{ $recentBooking->hotel }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="coach" label="Coach" type="text"
                                                        value="{{ $recentBooking->coach }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="shuttle" label="Shuttle" type="text"
                                                        value="{{ $recentBooking->shuttle }}" readonly autofocus />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-form-input name="price" label="Price" type="number"
                                                        value="{{ $recentBooking->price }}" readonly autofocus />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="fs-4 my-3">Recent Package Bookings</h3>
        <div class="row">
            @foreach ($recentPackageBookings as $recentPackageBooking)
                <div class="col-md-3 py-2">
                    <div class="card shadow border-0 h-100 b-radius" style="width: 18.5rem;">
                        <img src="{{ asset('storage/' . $recentPackageBooking->package->image) }}"
                            class="card-img-top image" alt="Package Image" loading="lazy">
                        <div class="card-body">
                            <h4 class="card-title">{{ $recentPackageBooking->package->days }} Days trip from
                                {{ $recentPackageBooking->package->origin }} to
                                {{ $recentPackageBooking->package->destination }}</h4>
                            <hr>
                            <p class="card-text">{{ $recentPackageBooking->package->days }} Days &
                                {{ $recentPackageBooking->package->days - 1 }} Nights <br>
                                Persons: {{ $recentPackageBooking->persons }} <br>
                                Rs. {{ $recentPackageBooking->package->price * $recentPackageBooking->persons }} <br>
                                @if ($recentPackageBooking->status == 'pending')
                                    <h5 class="text-secondary">Pending</h5>
                                @elseif ($recentPackageBooking->status == 'accepted')
                                    <h5 class="text-success">Accepted</h5>
                                @elseif ($recentPackageBooking->status == 'rejected')
                                    <h5 class="text-danger">Rejected</h5>
                                @elseif ($recentPackageBooking->status == 'completed')
                                    <h5 class="text-success">Completed</h5>
                                @endif
                            </p>
                            <div class="d-flex align-items-end justify-content-between">
                                <button
                                    class="btn btn-outline-secondary d-flex justify-content-center align-items-center form-control"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $recentPackageBooking->id }}">
                                    Explore&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </button>


                                <div class="modal fade" id="staticBackdrop{{ $recentPackageBooking->id }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdrop{{ $recentPackageBooking->id }}Label"
                                    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="staticBackdrop{{ $recentPackageBooking->id }}Label">
                                                    Package
                                                    Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <p>We are providing a tour plan for
                                                    {{ $recentPackageBooking->package->days }}
                                                    days from
                                                    <b>{{ $recentPackageBooking->package->origin }}</b> to
                                                    <b>{{ $recentPackageBooking->package->destination }}</b>
                                                    which will start on
                                                    {{ $recentPackageBooking->package->start_date }} and
                                                    will
                                                    end on
                                                    {{ $recentPackageBooking->package->end_date }}.
                                                </p>
                                                <p>The services we are providing are:
                                                <ul>
                                                    <li>Luxury {{ $recentPackageBooking->package->hotel }} Hotel</li>
                                                    <li>Comfortable {{ $recentPackageBooking->package->coach }} Coach
                                                    </li>
                                                    @if ($recentPackageBooking->package->shuttle != null)
                                                        <li>{{ $recentPackageBooking->package->shuttle }} Shuttle
                                                            Service</li>
                                                    @endif
                                                </ul>
                                                </p>
                                                <p>{{ $recentPackageBooking->package->days }} Days &
                                                    {{ $recentPackageBooking->package->days - 1 }} Nights</p>
                                                <p>Rs.
                                                    {{ $recentPackageBooking->package->price * $recentPackageBooking->persons }}
                                                </p>
                                                <p>Status: @if ($recentPackageBooking->status == 'pending')
                                                        <b class="text-secondary">Pending</b>
                                                    @elseif ($recentPackageBooking->status == 'accepted')
                                                        <b class="text-success">Accepted</b>
                                                    @elseif ($recentPackageBooking->status == 'rejected')
                                                        <b class="text-danger">Rejected</b>
                                                    @elseif ($recentPackageBooking->status == 'completed')
                                                        <b class="text-success">Completed</b>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>



<!-- here to-->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- here -->
@include('user.layouts.footer')
