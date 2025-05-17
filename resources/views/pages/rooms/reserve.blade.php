@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Reserve Room</h2>

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
            <h5 class="card-title">{{ $room->name }}</h5>
            <p class="card-text">
                Type: {{ $room->roomType->name ?? 'N/A' }}<br>
                Beds: {{ $room->no_beds }}<br>
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
@endsection
