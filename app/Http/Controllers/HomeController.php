<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Route;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $locations = Location::all(); // Fetch locations
        return view('home', compact('locations')); // Pass to view
    }

    public function search(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'date' => 'required|date',
            'trip_type' => 'required|in:oneway,roundtrip',
        ]);

        $from = $validated['from'];
        $to = $validated['to'];
        $date = $validated['date'];
        $tripType = $validated['trip_type'];

        // Fetch routes based on user input
        $routes = Route::where('from', $from)
            ->where('to', $to)
            ->get();

        // Store search data in session
    $request->session()->put('search_results', $routes);
    $request->session()->put('search_from', $from);
    $request->session()->put('search_to', $to);
    $request->session()->put('search_date', $date);
    $request->session()->put('trip_type', $tripType);
    // Log the session data for debugging
    Log::info('Session Data: ', $request->session()->all());

        return view('search', [
            'routes' => $routes,
            'tripType' => $tripType,
            'from' => $from,
            'to' => $to,
            'date' => $date,
           
        ]);
    }

    public function showResults(Request $request)
{
    $from = $request->session()->get('from');
    $to = $request->session()->get('to');
    $date = $request->session()->get('date');

    // Debugging
    \Log::info('From: ' . $from);
    \Log::info('To: ' . $to);
    \Log::info('Date: ' . $date);

    // Fetch routes based on the 'from' and 'to' locations
    $routes = Route::where('from', $from)
        ->where('to', $to)
        ->get();

    // Store the desired booking URL in the session
    $request->session()->put('redirect_to', route('bookings'));

    return view('search', compact('from', 'to', 'date', 'routes'));
}
}
