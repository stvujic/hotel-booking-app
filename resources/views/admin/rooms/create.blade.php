<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Room</title>
</head>
<body>
<h1>Add New Room</h1>

<form method="POST" action="{{ route('admin.rooms.store') }}">
    @csrf

    <label>Room Type:</label><br>
    <select name="room_type_id">
        @foreach($roomtypes as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select><br><br>

    <label>Number of Beds:</label><br>
    <input type="number" name="no_beds"><br><br>

    <label>Total Rooms:</label><br>
    <input type="number" name="total_room"><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01"><br><br>

    <label>Image (just filename for now):</label><br>
    <input type="text" name="image"><br><br>

    <label>Description:</label><br>
    <textarea name="desc"></textarea><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="1">Available</option>
        <option value="0">Not Available</option>
    </select><br><br>

    <button type="submit">Save</button>
</form>

<a href="{{ route('admin.rooms.index') }}">Back to list</a>
</body>
</html>
