<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Ticket;

class UserController extends Controller
{
    // Apply middleware to ensure the user is authenticated
    public function __construct()
    {
        $this->middleware('auth'); // This should be correct now
    }

    // Show the user profile dashboard
    public function showProfile()
    {
        $user = Auth::user();
        $tickets = Ticket::where('user_id', $user->id)
                         ->where('created_at', '>=', now()->subYear())
                         ->get();

        return view('profile', compact('user', 'tickets'));
    }

    // Update the user's profile information
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('myprofile')->with('success', 'Profile updated successfully');
    }

    // Change the user's password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('myprofile')->with('error', 'Current password is incorrect.');
        }

        // Update the password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('myprofile')->with('success', 'Password changed successfully');
    }
}
