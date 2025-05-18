<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container text-center mt-5">
    <h1 class="mb-4">🏨 Welcome to Stefan's Hotel Booking</h1>
    <p class="lead">Explore our rooms, book with ease, and enjoy your stay.</p>

    <div class="mt-4">
        <a href="{{ route('rooms.index') }}" class="btn btn-primary me-2">Browse Rooms</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
    </div>
</div>
</body>
</html>
