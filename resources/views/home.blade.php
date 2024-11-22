@extends('layouts.app') <!-- This references your main layout file -->

@section('content')
    <!-- Home Page Content (Form from the second layout) -->
    <div class="container mt-5">

        <!-- Slogan Section -->
        <div class="slogan text-center mb-5">
            <h2 style="font-size: 2.5rem; color: #124E66; font-weight: bold;">
                Your Reliable Partner in Transportation
            </h2>
            <p style="font-size: 1.2rem; color: #748D92;">
                Connecting you to your destination with comfort and reliability.
            </p>
        </div>

        <!-- Form Section -->
        <h1 class="text-center">Indian Atlantic Transportation</h1>
        <form id="transportationForm" action="{{ route('search') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label>Trip Type</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trip_type" id="oneWay" value="oneway" required>
                    <label class="form-check-label" for="oneWay">One Way</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="trip_type" id="roundTrip" value="roundtrip" required>
                    <label class="form-check-label" for="roundTrip">Round Trip</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="from"><i class="fas fa-map-marker-alt"></i> From</label>
                    <select name="from" id="from" class="form-control" required>
                        <option value="">Select Location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="to"><i class="fas fa-map-marker-alt"></i> To</label>
                    <select name="to" id="to" class="form-control" required>
                        <option value="">Select Location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="date">Travel Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Search</button>
            <div id="feedback" class="mt-3"></div>
        </form>
    </div>

    <script>
        document.getElementById('transportationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Gather form data
            const fromLocation = document.getElementById('from').value;
            const toLocation = document.getElementById('to').value;
            const travelDate = document.getElementById('date').value;
            const tripType = document.querySelector('input[name="trip_type"]:checked').value;

            const feedbackDiv = document.getElementById('feedback');
            feedbackDiv.textContent = ''; // Clear previous feedback

            // Validate inputs
            if (fromLocation === toLocation) {
                feedbackDiv.textContent = 'Error: "From" and "To" locations cannot be the same.';
                feedbackDiv.className = 'text-danger';
                return;
            }

            if (!travelDate) {
                feedbackDiv.textContent = 'Error: Travel date is required.';
                feedbackDiv.className = 'text-danger';
                return;
            }

            // Form is valid, simulate form submission
            feedbackDiv.textContent = 'Form submitted successfully! Trip Type: ' + tripType;
            feedbackDiv.className = 'text-success';

            // Uncomment the following line to actually submit the form
            // this.submit();
        });

        // Pusher configuration (optional, if required for bus tracking)
        import Echo from 'laravel-echo';
        window.Pusher = require('pusher-js');

        const echo = new Echo({
            broadcaster: 'pusher',
            key: 'your_pusher_app_key',
            cluster: 'your_pusher_cluster',
            encrypted: true
        });

        echo.channel('bus-tracking')
            .listen('BusLocationUpdated', (data) => {
                console.log('Bus Location:', data);
                // Update your UI with the new location
            });
    </script>
@endsection
