<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Available Rooms</h1>

    <div class="row">
        @foreach($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text">
                            Type: {{ $room->roomType->name ?? 'N/A' }} <br>
                            Beds: {{ $room->beds }} <br>
                            Price: €{{ $room->price }} / night
                        </p>
                        {{-- Možda kasnije dodam "View" ili "Reserve" dugme --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
