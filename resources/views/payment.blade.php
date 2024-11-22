<!-- resources/views/payment.blade.php -->

@extends('layouts.app') <!-- This will link to the app layout -->

@section('title', 'Payment Page') <!-- Sets the title in the layout -->

@section('content') <!-- This section will be injected into the @yield('content') in the app layout -->
    <div class="container mt-5">
        <h2 class="text-center">Payment Details</h2>

        @if(session('from') && session('to'))
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Trip Summary</h5>
                <p><strong>From:</strong> {{ session('from') }}</p>
                <p><strong>To:</strong> {{ session('to') }}</p>
                <p><strong>Date:</strong> {{ session('date') }}</p>
                <p><strong>Trip Type:</strong> {{ ucfirst(session('trip_type')) }}</p>

                <h5 id="total-price">Total Price: R{{ session('trip_type') === 'roundtrip' ? 200 : 100 }}</h5>

                <form id="payment-form" action="{{ route('confirmation') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="card-holder-name">Cardholder Name:</label>
                        <input type="text" id="card-holder-name" name="card_holder_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="card-number">Card Number:</label>
                        <input type="text" id="card-number" name="card_number" class="form-control" placeholder="1234 5678 9876 5432" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expiry-date">Expiration Date:</label>
                            <input type="month" id="expiry-date" name="expiry_date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="billing-address">Billing Address:</label>
                        <textarea id="billing-address" name="billing_address" class="form-control" required></textarea>
                    </div>

                    <input type="hidden" name="total_price" value="{{ session('trip_type') === 'roundtrip' ? 200 : 100 }}">

                    <button type="submit" class="btn btn-primary mt-3">Confirm Payment</button>
                </form>

            </div>
        </div>
        @else
        <p class="text-center">No booking details found. Please make a booking to proceed with payment.</p>
        @endif
    </div>
@endsection

@section('scripts') <!-- Optional section for custom scripts -->
    <script>
        // Wait for the document to be fully loaded
        $(document).ready(function() {
            // Validate the form before submission
            $('#payment-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Check if all required fields are filled
                var cardHolderName = $('#card-holder-name').val().trim();
                var cardNumber = $('#card-number').val().trim();
                var expiryDate = $('#expiry-date').val().trim();
                var cvv = $('#cvv').val().trim();
                var billingAddress = $('#billing-address').val().trim();

                if (!cardHolderName || !cardNumber || !expiryDate || !cvv || !billingAddress) {
                    alert('Please fill in all fields.');
                    return;
                }

                // Further validations (e.g., check if card number is 16 digits, etc.)
                var cardNumberRegex = /^\d{16}$/;
                if (!cardNumberRegex.test(cardNumber)) {
                    alert('Please enter a valid 16-digit card number.');
                    return;
                }

                // If form is valid, submit the form and redirect to confirmation page
                // For now, we'll simulate the redirect
                this.submit(); // Uncomment this line to submit the form after validation
            });
        });
    </script>
@endsection
