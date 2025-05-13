<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Room Type</title>
</head>
<body>
<h1>Add New Room Type</h1>

<form method="POST" action="{{ route('admin.roomtypes.store') }}">
    @csrf

    <label for="name">Room Type Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <button type="submit">Save</button>
</form>

<a href="{{ route('admin.roomtypes.index') }}">Back to list</a>
</body>
</html>
