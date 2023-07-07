<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="list-group list-group-flush my-3">
            <a href="{{ url('/service-providers/home') }}"
                class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ url('/service-provider/bookings') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-book me-2"></i>Bookings
            </a>
            <a href="{{ url('/service-provider/package') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-gift me-2"></i>Package
            </a>
            <a href="{{ url('/service-provider/services') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-wrench me-2"></i>Services
            </a>
            <a href="{{ url('/service-provider/profile') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-user me-2"></i>Profile
            </a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3 primary-text" id="menu-toggle" onclick=""></i>
