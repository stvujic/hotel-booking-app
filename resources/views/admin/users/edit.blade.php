<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>

<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label>First Name:</label><br>
    <input type="text" name="name" value="{{ $user->name }}"><br><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" value="{{ $user->last_name }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $user->email }}"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="{{ $user->phone }}"><br><br>

    <label>Is Admin:</label><br>
    <select name="is_admin">
        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>No</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('admin.users.index') }}">Back to list</a>
</body>
</html>
