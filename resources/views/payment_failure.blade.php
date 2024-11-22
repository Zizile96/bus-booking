<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Payment Failed</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-danger">Payment Failed!</h2>
        <p class="text-center">There was an issue processing your payment. Please try again.</p>
        <a href="{{ route('payment.page') }}" class="btn btn-primary mt-3">Back to Payment</a>
    </div>
</body>
</html>

