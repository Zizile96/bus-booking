<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Indian Atlantic')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to your custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
</head>
<body>
   
<div class="contact-info">
        <p>
            <i class="fas fa-phone"></i> 043 611 8000 | 
            <i class="fas fa-envelope"></i> 
            <a href="mailto:Bookings@indianatlantic.co.za" style="color: black;">Bookings@indianatlantic.co.za</a>
        </p>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/image/zee3.jfif" alt="Logo" style="width: 80px; height: auto;"> Indian Atlantic
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/our-route">Our Routes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('offices') }}">Booking Office</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('myprofile') }}">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link book-here" href="/bookings">Book Here</a></li> <!-- This link is highlighted -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container">
        @yield('content') <!-- This is where the content from the About Us page will go -->
    </div>

    <!-- Footer -->
    <footer class="footer custom-footer">
        <div>
            <span class="text-muted">© 2024 Indian Atlantic</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
