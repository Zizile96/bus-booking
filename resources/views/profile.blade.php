@extends('layouts.app') <!-- This will link to the app layout -->

@section('title', 'My Profile') <!-- Sets the title in the layout -->

@section('content') <!-- This section will be injected into the @yield('content') in the app layout -->
    <div class="container mt-5">

        <!-- My Profile Section -->
        <h2 class="text-center mt-5">My Profile</h2>

        <!-- Display success/error messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Profile Information -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Profile Information</h5>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                </form>
            </div>
        </div>

        <!-- Change Password Section -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Change Password</h5>

                <form action="{{ route('profile.changePassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                </form>
            </div>
        </div>

      
        <!-- Display Ticket Details if Payment Information is Available (at the bottom) -->
        @if(Session::has('ticket_details'))
            <div class="card mt-4">
                <div class="card-body">
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
                </div>
            </div>
        @else
            <p class="text-center">No payment information available. Please try again.</p>
        @endif

    </div>
@endsection 

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.10.0/dist/echo.iife.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>
    <script>
        // Initialize Echo with Pusher
        const echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env('PUSHER_APP_KEY') }}',
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        // Listen to the channel and event
        echo.channel('user.{{ auth()->id() }}')
            .listen('TicketPurchased', (event) => {
                // Append the new ticket to the list
                let ticket = event.ticket;
                let ticketItem = ` 
                    <li class="list-group-item">
                        <strong>From:</strong> ${ticket.route.from} <br>
                        <strong>To:</strong> ${ticket.route.to} <br>
                        <strong>Date:</strong> ${ticket.created_at} <br>
                        <strong>Price:</strong> R${ticket.price} <br>
                        <strong>Trip Type:</strong> ${ticket.trip_type.charAt(0).toUpperCase() + ticket.trip_type.slice(1)}
                    </li>
                `;
                // Append new ticket to the tickets list
                document.querySelector('.list-group').innerHTML += ticketItem;
            });
    </script>
@endsection
