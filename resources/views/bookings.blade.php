@extends('layouts.app')

@section('title', 'Your Bookings')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Your Bookings</h2>

        @if(session('from') && session('to'))
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Trip Details</h5>
                    <p><strong>From:</strong> {{ session('from') }}</p>
                    <p><strong>To:</strong> {{ session('to') }}</p>
                    <p><strong>Date:</strong> {{ session('date') }}</p>
                    <p><strong>Trip Type:</strong> {{ ucfirst(session('trip_type')) }}</p>
                    
                    <form action="{{ route('payment') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="passenger-count">Number of Passengers:</label>
                            <input type="number" id="passenger-count" name="passenger_count" min="1" value="1" class="form-control" onchange="updatePrice()">
                        </div>

                        <h5 id="total-price">Total Price: R{{ session('trip_type') === 'roundtrip' ? 200 : 100 }}</h5>
                        <input type="hidden" name="total_price" id="total_price_input" value="{{ session('trip_type') === 'roundtrip' ? 200 : 100 }}">
                        <button type="submit" class="btn btn-primary mt-3">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">
                No bookings found. Please make a <a href="{{ route('home') }}">booking</a> to see details.
            </p>
            
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('home') }}"; // Redirect to the home page after 5 seconds
                }, 5000); // 5000ms = 5 seconds
            </script>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function updatePrice() {
            const pricePerPassenger = {{ session('trip_type') === 'roundtrip' ? 200 : 100 }};
            const numberOfPassengers = document.getElementById('passenger-count').value;
            const totalPrice = pricePerPassenger * numberOfPassengers;

            // Calculate the selected seats price if needed (optional)
            const selectedSeats = document.querySelectorAll('input[name="seats"]:checked');
            const seatPrice = selectedSeats.length > 0 ? selectedSeats.length * 50 : 0; // Assume R50 per seat
            const finalPrice = totalPrice + seatPrice;

            document.getElementById('total-price').innerText = 'Total Price: R' + finalPrice;
            document.getElementById('total_price_input').value = finalPrice; // Update hidden input
        }
    </script>
@endsection

