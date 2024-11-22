<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Route - Indian Atlantic</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to your custom CSS -->
    
</head>
<body>
    
<div class="contact-info">
        <p>
            <i class="fas fa-phone"></i> 043 611 8000 | 
            <i class="fas fa-envelope"></i> 
            <a href="mailto:Bookings@indianatlantic.co.za" style="color: black;">Bookings@indianatlantic.co.za</a>
        </p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/our-route">Our Route</a></li>
                    <li class="nav-item"><a class="nav-link" href="/offices">Booking Office</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bookings') }}">Book Here</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-4">Choose the Best Route, Experience the Best Journey</h1>
        <div class="route-container">
            <div class="provinces">
                <div class="province">
                    <h4>Gauteng</h4>
                    <label for="gauteng-cities">Major Cities:</label>
                    <select id="gauteng-cities" class="form-control">
                        <option>Johannesburg - 1 Eloff St, Johannesburg, 2001, South Africa</option>
                        <option>Pretoria - 175 Tswane, Pretoria, 0002, South Africa</option>
                        <option>Ekurhuleni - 2117 K90 Road, Ekurhuleni, 1620, South Africa</option>
                    </select>
                </div>
                <div class="province">
                    <h4>Western Cape</h4>
                    <label for="western-cape-cities">Major Cities:</label>
                    <select id="western-cape-cities" class="form-control">
                        <option>Cape Town - 1A Epping Ave, Cape Town, 7764, South Africa</option>
                        <option>Stellenbosch - 40 Adam Tas Rd, Stellenbosch, 7600, South Africa</option>
                        <option>George - 4 Kraaibosch Rd, George, 6536, South Africa</option>
                    </select>
                </div>
                <div class="province">
                    <h4>Eastern Cape</h4>
                    <label for="eastern-cape-cities">Major Cities:</label>
                    <select id="eastern-cape-cities" class="form-control">
                        <option>Port Elizabeth - 1 Eighth Ave, Port Elizabeth, 6001, South Africa</option>
                        <option>East London - 50A Terminus Rd, East London, 5201, South Africa</option>
                        <option>Mthatha - 1 Nelson Mandela Dr, Mthatha, 5100, South Africa</option>
                    </select>
                </div>
                <div class="province">
                    <h4>KwaZulu-Natal</h4>
                    <label for="kwazulu-natal-cities">Major Cities:</label>
                    <select id="kwazulu-natal-cities" class="form-control">
                        <option>Durban - 1 Johnstone Rd, Durban, 4001, South Africa</option>
                        <option>Pietermaritzburg - 1 Commercial Rd, Pietermaritzburg, 3201, South Africa</option>
                        <option>Richards Bay - 1 Marina Rd, Richards Bay, 3900, South Africa</option>
                    </select>
                </div>
            </div>
            <div class="map">
                <img src="image/map.jpg" alt="Map of South Africa" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <footer class="footer custom-footer">
        <div class="container">
            <span class= "text-muted">© 2024 Indian Atlantic</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
