@extends('layouts.app')

@section('content')
<main>
    <section class="main-bg text-white text-center d-flex flex-column align-items-center justify-content-center h-100v">
        <h1>Discover Your Perfect Getaway</h1>
        <h4>Explore and book the best travel experiences with our comprehensive travel platform.</h4>
        <a href="{{ route('register') }}" class="btn cta">Get Started</a>
    </section>
    <section class="bg-white p-4">
        <div class="container">
            <h2 class="text-center">About Our Travel Services<hr></h3>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start align-items-center">
                    <p class="lh-lg fs-5 ">
                        We are a trusted and reliable travel platform that offers a wide range of services to cater to your 
                        travel needs. Whether you're looking for car or bike rentals, hotel accommodations, coach services, or 
                        exciting tour packages, we've got you covered. Our mission is to make your travel experience seamless and memorable.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center ">
                    <img src="{{ asset('images/about-img.jpg') }}" class="img-fluid w-75 rounded shadow-lg" alt="about-image">
                </div>
            </div>
        </div>
    </section>
    <section class="py-4 wrapper">
        <div class="container">
            <h2 class="text-center">How It Works? <hr></h2>
            <div class="row align-items-stretch">
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fa fa-search fa-3x text-cyan"></i>
                            <h4 class="card-title pt-3">Browse Services</h4>
                            <p class="card-text lh-lg">Explore a wide range of services available for your travel needs. Find the perfect options that suit your preferences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fa fa-list-alt fa-3x text-cyan"></i>
                            <h4 class="card-title pt-3">Create Your Package</h4>
                            <p class="card-text lh-lg">Customize your travel experience by creating your own package. Select services from various categories and build your ideal itinerary.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fa fa-bookmark fa-3x text-cyan"></i>
                            <h4 class="card-title pt-3">Book Your Package</h4>
                            <p class="card-text lh-lg">Once you've created your package, easily book it and secure your travel arrangements. Enjoy a hassle-free booking experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body text-center">
                            <i class="fa fa-plane fa-3x text-cyan"></i>
                            <h4 class="card-title pt-3">Enjoy Your Travel</h4>
                            <p class="card-text lh-lg">Sit back, relax, and enjoy your travel experience. Make lasting memories as you explore exciting destinations and attractions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white p-4">
        <div class="container">
            <h2 class="text-center">Contact us<hr></h2>
            <div class="row">
                <div class="col-lg-6 pt-3">
                    <b>Email: </b><a href="mailto:admin@travel-north.com">admin@travel-north.com</a><br><br>
                    <b>Phone: </b><a href="tel:+923001234567">+923001234567</a>
                </div>
                <div class="vr p-0"></div>
                <div class="col-lg-5">
                    <x-form>
                        <x-form-input name="name" label="Name" type="text" required  />
                        <x-form-input name="email" label="Email" type="email"  required  />
                        <x-form-textarea name="message" label="Message" required />
                        <x-form-submit/>
                    </x-form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection