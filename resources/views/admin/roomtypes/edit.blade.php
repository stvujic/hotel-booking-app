<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Room Type</title>
</head>
<body>
<h1>Edit Room Type</h1>

<form method="POST" action="{{ route('admin.roomtypes.update', $roomtype->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Room Type Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $roomtype->name }}"><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('admin.roomtypes.index') }}">Back to list</a>
</body>
</html>
