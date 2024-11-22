<!-- resources/views/about.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">About Us</h2>
        <p class="text-center">We are committed to providing the best service in travel. Here’s more about us!</p>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Our Mission</h4>
                <p>We aim to offer reliable and efficient travel options across various routes, helping people reach their destinations safely and comfortably.</p>
            </div>
            <div class="col-md-6">
                <h4>Our Vision</h4>
                <p>We envision becoming the leading travel agency, offering innovative solutions and exceptional customer service, making every journey memorable.</p>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="mt-5">
            <h4 class="text-center">Our Core Values</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Customer-Centricity:</strong> We place our customers at the center of everything we do, ensuring their needs and expectations are met.</li>
                <li class="list-group-item"><strong>Reliability:</strong> We are dedicated to providing consistent, dependable service that our customers can trust.</li>
                <li class="list-group-item"><strong>Sustainability:</strong> We believe in operating in an environmentally responsible way, ensuring that our travel services minimize impact on the environment.</li>
                <li class="list-group-item"><strong>Innovation:</strong> We continuously strive for creative solutions to improve our services and enhance customer experiences.</li>
            </ul>
        </div>

        <!-- Company History Section -->
        <div class="mt-5">
            <h4 class="text-center">Our History</h4>
            <p>Founded in 2023, Indian Atlantic started as a small family-owned travel agency based in East London. Over the year, we have expanded our services to offer a wide range of travel options, including guided tours, personalized travel packages, and online booking solutions. Our growth has been driven by our dedication to providing excellent customer service and our ability to adapt to the ever-changing travel industry.</p>
        </div>

        <!-- The Team Section -->
        <div class="mt-5">
            <h4 class="text-center">Meet Our Team</h4>
            <p class="text-center">Our team consists of passionate professionals who are dedicated to making every journey a memorable one. Get to know the people behind Indian Atlantic:</p>

            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-md-4">
                    <div class="card">
                    <img src="{{ asset('image/ph1.jfif') }}" class="card-img-top" alt="John Doe">
                        <div class="card-body">
                            <h5 class="card-title">Lutho Xuba</h5>
                            <p class="card-text">Founder & CEO</p>
                            <p class="text-muted">Lutho has over 20 years of experience in the travel industry. She is passionate about providing unique and memorable travel experiences for customers.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-4">
                    <div class="card">
                    <img src="{{ asset('image/ph2.jfif') }}" class="card-img-top" alt="John Doe">
                        <div class="card-body">
                            <h5 class="card-title">Thando Nogemane</h5>
                            <p class="card-text">Operations Manager</p>
                            <p class="text-muted">Thando ensures the smooth running of our daily operations, working closely with partners and clients to provide seamless travel experiences.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-4">
                    <div class="card">
                    <img src="{{ asset('image/ph3.jfif') }}" class="card-img-top" alt="John Doe">
                        <div class="card-body">
                            <h5 class="card-title">Phiwe Nogemane</h5>
                            <p class="card-text">Customer Relations Manager</p>
                            <p class="text-muted">Phiwe is responsible for building strong relationships with customers, ensuring their needs are always met before, during, and after their journeys.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="/" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
@endsection
