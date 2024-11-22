@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Register</h3>

    <form id="registrationForm">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
            <div class="mt-2">
                <strong>Password Requirements:</strong>
                <ul id="password-requirements">
                    <li id="length" class="requirement">At least 8 characters long</li>
                    <li id="uppercase" class="requirement">At least 1 uppercase letter (A-Z)</li>
                    <li id="lowercase" class="requirement">At least 1 lowercase letter (a-z)</li>
                    <li id="number" class="requirement">At least 1 number (0-9)</li>
                    <li id="special" class="requirement">At least 1 special character (e.g., @, #, $, %)</li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="mt-3">
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const requirements = {
        length: false,
        uppercase: false,
        lowercase: false,
        number: false,
        special: false
    };

    passwordInput.addEventListener('input', function() {
        const value = passwordInput.value;

        requirements.length = value.length >= 8;
        requirements.uppercase = /[A-Z]/.test(value);
        requirements.lowercase = /[a-z]/.test(value);
        requirements.number = /[0-9]/.test(value);
        requirements.special = /[!@#$%^&*(),.?":{}|<>]/.test(value);

        document.getElementById('length').style.color = requirements.length ? 'green' : 'red';
        document.getElementById('uppercase').style.color = requirements.uppercase ? 'green' : 'red';
        document.getElementById('lowercase').style.color = requirements.lowercase ? 'green' : 'red';
        document.getElementById('number').style.color = requirements.number ? 'green' : 'red';
        document.getElementById('special').style.color = requirements.special ? 'green' : 'red';
    });

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        const csrfToken = document.querySelector('input[name="_token"]').value;

        fetch('{{ route('register') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the login page with a success message
                window.location.href = '{{ route('login') }}';
            } else {
                // Handle validation errors
                let errors = '';
                for (const [key, value] of Object.entries(data.errors)) {
                    errors += `${value.join(', ')}\n`;
                }
                alert(errors);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection