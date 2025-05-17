@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Available Rooms</h1>

    {{-- Search Form --}}
    <form action="{{ route('rooms.search') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="number" name="no_beds" class="form-control" placeholder="Number of beds">
            </div>
            <div class="col-md-4">
                <select name="room_type_id" class="form-control">
                    <option value="">-- Room Type --</option>
                    @foreach(\App\Models\RoomType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>

    {{-- Room Cards --}}
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text">
                            Type: {{ $room->roomType->name ?? 'N/A' }} <br>
                            Beds: {{ $room->no_beds }} <br>
                            Price: €{{ $room->price }} / night
                        </p>
                        <a href="{{ route('rooms.reserve', $room->id) }}" class="btn btn-success mt-2">Reserve</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
