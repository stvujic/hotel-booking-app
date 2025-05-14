<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rooms</title>
</head>
<body>

@if(session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<h1>Rooms</h1>

<a href="{{ route('admin.rooms.create') }}">➕ Add New Room</a>
<br><br>

<ul>
    @foreach($rooms as $room)
        <li>
            ID: {{ $room->id }} |
            Type: {{ $room->roomtype->name }} |
            Beds: {{ $room->no_beds }} |
            Price: ${{ $room->price }} |
            Status: {{ $room->status ? 'Available' : 'Not available' }}

            <a href="{{ route('admin.rooms.edit', $room->id) }}">✏️ Edit</a>

            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this room?')">🗑️ Delete</button>
            </form>
        </li>
    @endforeach
</ul>

</body>
</html>
