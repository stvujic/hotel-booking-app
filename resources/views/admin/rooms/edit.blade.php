<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Room</title>
</head>
<body>
<h1>Edit Room</h1>

<form method="POST" action="{{ route('admin.rooms.update', $room->id) }}">
    @csrf
    @method('PUT')

    <label>Room Type:</label><br>
    <select name="room_type_id">
        @foreach($roomtypes as $type)
            <option value="{{ $type->id }}" {{ $type->id == $room->room_type_id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Number of Beds:</label><br>
    <input type="number" name="no_beds" value="{{ $room->no_beds }}"><br><br>

    <label>Total Rooms:</label><br>
    <input type="number" name="total_room" value="{{ $room->total_room }}"><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" value="{{ $room->price }}"><br><br>

    <label>Image:</label><br>
    <input type="text" name="image" value="{{ $room->image }}"><br><br>

    <label>Description:</label><br>
    <textarea name="desc">{{ $room->desc }}</textarea><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="1" {{ $room->status ? 'selected' : '' }}>Available</option>
        <option value="0" {{ !$room->status ? 'selected' : '' }}>Not Available</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('admin.rooms.index') }}">Back to list</a>
</body>
</html>
