<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route; // or your relevant model
use App\Models\Ticket; // if you have a Ticket model
use Illuminate\Support\Facades\Auth; // if you want to handle authenticated users
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationMail;


class TicketController extends Controller
{
    public function buyTicket($route_id, $trip_type)
    {
        // Validate the route_id and trip_type
        $route = Route::find($route_id);
        if (!$route) {
            return redirect()->back()->with('error', 'Route not found.');
        }
    
        // Create a new ticket record in the database
        $ticket = new Ticket();
        $ticket->route_id = $route_id;
        $ticket->trip_type = $trip_type;
        $ticket->user_id = Auth::id(); // If user is logged in
        // Assuming you have price and date as additional fields
        $ticket->price = ($trip_type === 'roundtrip') ? 200 : 100; // Example price logic
        $ticket->date = now(); // Or set your desired date
        $ticket->save();
    
        // Store relevant search details in session
        session([
            'from' => $route->from,
            'to' => $route->to,
            'date' => $ticket->date, // Adjust as necessary
            'trip_type' => $trip_type,
        ]);
    
        // Redirect to a success page or the bookings page
        return redirect()->route('bookings')->with('success', 'Ticket purchased successfully!');
    }

    public function showBookings(Request $request)
    {
        $routes = $request->session()->get('routes', []);
        $from = $request->session()->get('from');
        $to = $request->session()->get('to');
        $date = $request->session()->get('date');
        $tripType = $request->session()->get('trip_type');
    
        return view('bookings', compact('routes', 'from', 'to', 'date', 'tripType'));
    }

    public function processBooking(Request $request)
{
    // Validate the number of passengers
    $request->validate([
        'passenger_count' => 'required|integer|min:1',
    ]);

    // Get the trip type and calculate price per passenger
    $pricePerPassenger = ($request->trip_type === 'roundtrip') ? 200 : 100;
    $totalPrice = $pricePerPassenger * $request->passenger_count;

    // Store the price in session for later use (e.g., payment)
    session(['total_price' => $totalPrice]);

    // Redirect to payment method
    return redirect()->route('payment_method')->with([
        'total_price' => $totalPrice,
        'passenger_count' => $request->passenger_count,
    ]);
}
public function sendTicket(Request $request)
{
    // Retrieve ticket details from session or database using ticket ID
    $ticket = Ticket::find($request->ticket_id);
    
    if (!$ticket) {
        return redirect()->back()->with('error', 'Ticket not found.');
    }

    // Check which option was selected
    if ($request->has('send_email')) {
        // Send Email
        Mail::to($ticket->user->email)->send(new TicketConfirmationMail($ticket));
        return redirect()->back()->with('success', 'Ticket sent via email!');
    }

    if ($request->has('send_sms')) {
        // Send SMS (using a service like Twilio or another SMS gateway)
        $this->sendSms($ticket->user->phone_number, $ticket);
        return redirect()->back()->with('success', 'Ticket sent via SMS!');
    }

    return redirect()->back()->with('error', 'Invalid request.');
}

private function sendSms($phoneNumber, $ticket)
{
    // Example of sending SMS via Twilio (replace with actual implementation)
    // Twilio::message($phoneNumber, "Your ticket details: {$ticket->details}");
}
public function storeTicket(Request $request)
{
    // Create and save a new ticket
    $ticket = new Ticket;
    $ticket->from = $request->from;
    $ticket->to = $request->to;
    $ticket->date = $request->date;
    $ticket->trip_type = $request->trip_type;
    $ticket->price = $request->price;
    $ticket->payment_method = $request->payment_method;
    $ticket->user_id = auth()->user()->id;  // Assuming user is logged in
    $ticket->save();

    // Store ticket details in session
    session(['ticket_details' => $ticket]);

    // Send email to the user with the ticket details
    Mail::to(auth()->user()->email)->send(new TicketConfirmationMail($ticket));

    // Redirect back with a success message
    return redirect()->route('ticket.success')->with('success', 'Ticket created and sent successfully!');
}

// Show the payment success page (ticket details)
public function showSuccessPage()
{
    return view('payment_success');
}
}



