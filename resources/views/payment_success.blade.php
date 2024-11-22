@extends('layouts.app') <!-- This will link to the app layout -->

@section('title', 'Payment Success') <!-- Sets the title in the layout -->

@section('content') <!-- This section will be injected into the @yield('content') in the app layout -->
    <div class="container mt-5">
        <h2 class="text-center">Payment Successful</h2>

        @if(Session::has('ticket_details'))
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Thank you for your payment!</h5>
                    <p>Your booking has been confirmed. You will receive a confirmation email shortly.</p>

                    <h6 class="mt-4">Ticket Details:</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>From:</strong> {{ Session::get('ticket_details')['from'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>To:</strong> {{ Session::get('ticket_details')['to'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>Date:</strong> {{ Session::get('ticket_details')['date'] }}
                        </li>
                        <li class="list-group-item">
                            <strong>Trip Type:</strong> {{ ucfirst(Session::get('ticket_details')['trip_type']) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Price:</strong> R{{ Session::get('ticket_details')['price'] }}
                        </li>
                    </ul>

                    <h6 class="mt-4">Payment Method:</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Method:</strong> {{ Session::get('payment_method') }}
                        </li>
                    </ul>

                    <!-- Action buttons -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('myprofile') }}" class="btn btn-primary">Go to My Profile</a>

                        <!-- Log Out Form -->
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="redirect_to" value="{{ url('/home') }}">
                            <button type="submit" class="btn btn-danger ml-3">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">No payment information available. Please try again.</p>
        @endif
    </div>
@endsection
