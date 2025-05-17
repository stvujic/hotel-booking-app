@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Rooms</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.rooms.create') }}" class="btn btn-success mb-3">➕ Add New Room</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Room Type</th>
            <th>Beds</th>
            <th>Price (€)</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->roomtype->name ?? 'N/A' }}</td>
                <td>{{ $room->no_beds }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->status ? 'Available' : 'Not available' }}</td>
                <td>
                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>

                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
