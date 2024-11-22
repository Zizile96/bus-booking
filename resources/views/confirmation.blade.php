@extends('layouts.app') <!-- Link to the app.blade.php layout -->

@section('title', 'Payment Confirmation') <!-- Set the page title -->

@section('content') <!-- This section will contain the content specific to the payment confirmation page -->
    <div class="container mt-5">
        <h2 class="text-center">Confirm Your Payment</h2>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Payment Details</h5>
                <p><strong>Cardholder Name:</strong> {{ $payment_data['card_holder_name'] }}</p>
                <p><strong>Card Number:</strong> {{ $payment_data['card_number'] }}</p>
                <p><strong>Expiration Date:</strong> {{ $payment_data['expiry_date'] }}</p>
                <p><strong>CVV:</strong> {{ $payment_data['cvv'] }}</p>
                <p><strong>Billing Address:</strong> {{ $payment_data['billing_address'] }}</p>
                <p><strong>Total Price:</strong> R{{ $payment_data['total_price'] }}</p>

                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="card_holder_name" value="{{ $payment_data['card_holder_name'] }}">
                    <input type="hidden" name="card_number" value="{{ $payment_data['card_number'] }}">
                    <input type="hidden" name="expiry_date" value="{{ $payment_data['expiry_date'] }}">
                    <input type="hidden" name="cvv" value="{{ $payment_data['cvv'] }}">
                    <input type="hidden" name="billing_address" value="{{ $payment_data['billing_address'] }}">
                    <input type="hidden" name="total_price" value="{{ $payment_data['total_price'] }}">

                    <button type="submit" class="btn btn-success mt-3">Confirm and Pay</button>
                    <a href="{{ route('payment') }}" class="btn btn-danger mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection <!-- End the content section -->
