<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserve Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Reserve Room: {{ $room->name }}</h2>

    {{-- Flash poruke --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Informacije o sobi --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $room->roomType->name ?? 'N/A' }}</h5>
            <p class="card-text">
                Beds: {{ $room->no_beds }} <br>
                Price: €{{ $room->price }} / night
            </p>
        </div>
    </div>

    {{-- Forma za rezervaciju --}}
    <form method="POST" action="{{ route('rooms.reserve.store', $room->id) }}">
        @csrf
        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in Date</label>
            <input type="date" name="check_in" id="check_in" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out Date</label>
            <input type="date" name="check_out" id="check_out" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirm Reservation</button>
    </form>
</div>

</body>
</html>
