@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center">Get In Touch With Us.</p>

        <div class="row contact-row">
            <!-- Contact Form -->
            <div class="col-md-6 contact-form">
                <h3>Send Us a Message</h3>
                <form action="/submit-contact" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="col-md-6 contact-info">
                <h3>Other Ways to Contact Us</h3>
                <ul>
                    <li><strong>Phone:</strong> (123) 456-7890</li>
                    <li><strong>Email:</strong> <a href="mailto:support@company.com">indianatlantic.com</a></li>
                    <li><strong>Address:</strong> 33 Church Street, East London, South Africa</li>
                </ul>

                <!-- Google Map Embed -->
                <h3>Our Location</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=YOUR_GOOGLE_MAPS_EMBED_URL" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
