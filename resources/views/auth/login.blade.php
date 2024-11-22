@extends('layouts.app') <!-- Extend the main layout file -->

@section('content')
<div class="container mt-5">
    <h3>Login</h3>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Login Form -->
    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="redirect_to" value="{{ route('bookings') }}">

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required autofocus>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- Links to Register or Reset Password -->
    <div class="mt-3">
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        <p><a href="{{ route('password.request') }}">Forgot Password?</a></p>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the login form submission with AJAX
        $('#loginForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Redirect after successful login
                        window.location.href = response.redirect_to || '{{ route('home') }}';
                    } else {
                        alert(response.message || 'Login failed. Please try again.'); // Handle error
                    }
                },
                error: function(xhr) {
                    // Show validation errors if they exist
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    for (const key in errors) {
                        errorMessage += errors[key].join(', ') + '\n';
                    }
                    alert(errorMessage || 'An unexpected error occurred.'); // Handle error
                }
            });
        });
    });
</script>
@endsection
