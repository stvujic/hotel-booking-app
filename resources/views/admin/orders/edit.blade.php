@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Edit Reservation #{{ $order->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} {{ $user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id', $order->room_id) == $room->id ? 'selected' : '' }}>
                        {{ $room->roomtype->name ?? 'N/A' }} - {{ $room->no_beds }} beds - €{{ $room->price }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in</label>
            <input type="date" name="check_in" id="check_in" class="form-control"
                   value="{{ old('check_in', $order->check_in->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out</label>
            <input type="date" name="check_out" id="check_out" class="form-control"
                   value="{{ old('check_out', $order->check_out->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Reservation</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
