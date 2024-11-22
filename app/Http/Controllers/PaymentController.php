<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    // Show the payment page
    public function showPaymentPage()
    {
        if (Session::has('from') && Session::has('to') && Session::has('date') && Session::has('trip_type')) {
            return view('payment');  // Payment form view
        } else {
            return redirect()->route('booking.create')->with('error', 'No booking details found. Please make a booking first.');
        }
    }

    // Show the payment confirmation page (this is where the user confirms payment details)
    public function confirmPayment(Request $request)
    {
        // Pass payment details from the form to the confirmation page
        $paymentData = $request->all();
        return view('confirmation', ['payment_data' => $paymentData]);
    }

    // Process the payment after confirmation
    public function processPayment(Request $request)
{
    // Validate the payment data from the form
    $validated = $request->validate([
        'card_holder_name' => 'required|string|max:255',
        'card_number' => 'required|digits:16',
        'expiry_date' => 'required|date_format:Y-m',
        'cvv' => 'required|digits:3',
        'billing_address' => 'required|string',
        'total_price' => 'required|numeric',
    ]);

    // Simulate payment processing (You should replace this with actual payment gateway logic)
    $paymentStatus = $this->simulatePaymentProcess($validated);

    // Store the ticket and payment information in session if payment is successful
    if ($paymentStatus) {
        // Store session details for ticket and payment confirmation
        Session::put('ticket_details', [
            'from' => session('from'),
            'to' => session('to'),
            'date' => session('date'),
            'trip_type' => session('trip_type'),
            'price' => $validated['total_price'],
        ]);
        
        Session::put('payment_method', 'Credit Card'); // Example: You can track the payment method here

        // Redirect to success page
        return redirect()->route('payment_success');
    } else {
        // If payment fails, redirect to failure page
        return redirect()->route('payment_failure')->with('error', 'Payment failed. Please try again.');
    }
}

    // Simulate payment processing
    private function simulatePaymentProcess($paymentData)
    {
        return true;  // Simulate successful payment
    }

    // Handle payment failure
    public function paymentFailure()
    {
        return view('payment_failure');  // Failure view
    }
}
