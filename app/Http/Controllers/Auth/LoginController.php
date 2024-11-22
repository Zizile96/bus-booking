<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Adjust the view path as necessary
    }

    public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($request->only('email', 'password'))) {
        // Retrieve search results from session
        $routes = $request->session()->get('search_results', []);
        $from = $request->session()->get('search_from');
        $to = $request->session()->get('search_to');
        $date = $request->session()->get('search_date');
        $tripType = $request->session()->get('trip_type');

        // Store search results for the bookings page
        $request->session()->put('routes', $routes);
        $request->session()->put('from', $from);
        $request->session()->put('to', $to);
        $request->session()->put('date', $date);
        $request->session()->put('trip_type', $tripType);

        // Redirect to the intended page or the bookings page
        return redirect()->route('bookings');
    }

    // Return error response if login fails
    return response()->json(['success' => false, 'message' => 'Invalid credentials.'], 401);
}

public function logout(Request $request)
{
    Auth::logout(); // Log the user out
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect('/home'); // Redirect to home
}
}
