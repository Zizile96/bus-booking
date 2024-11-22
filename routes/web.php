<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingOfficeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
 

Auth::routes();
// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::post('/book-ticket', [TicketController::class, 'buyTicket'])->name('book_ticket');
    Route::get('/bookings', [TicketController::class, 'showBookings'])->name('bookings');
});

Route::get('/buy-ticket/{route_id}/{trip_type}', [TicketController::class, 'buyTicket'])->name('buy_ticket');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');

//offices
Route::get('/offices', [BookingOfficeController::class, 'offices'])->name('offices');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/process-booking', [TicketController::class, 'processBooking'])->name('process_booking');

// Show the payment page (GET request)
Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment');

Route::get('/confirmation', [PaymentController::class, 'confirmPayment'])->name('confirmation');

// Route to process the payment (POST request)
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

// Success and failure routes
Route::get('/payment/success', function () {
    return view('payment_success');  // Success page
})->name('payment_success');

Route::get('/payment-failure', [PaymentController::class, 'paymentFailure'])->name('payment_failure');
Route::get('/our-route', function () {
    return view('our_route');
});

Route::get('/contact-us', function () {
    return view('contact_us');
});





// Route for About Us page
Route::get('/about-us', [AboutController::class, 'showAboutUs'])->name('about-us');

Route::middleware('auth')->post('/change-password', [ResetPasswordController::class, 'changePassword'])->name('user.change-password');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('myprofile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.changePassword');
});


