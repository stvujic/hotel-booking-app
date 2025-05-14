<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

@if(session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<h1>Users</h1>

<ul>
    @foreach($users as $user)
        <li>
            ID: {{ $user->id }} |
            Name: {{ $user->name }} {{ $user->last_name }} |
            Email: {{ $user->email }} |
            Phone: {{ $user->phone ?? '-' }} |
            Admin: {{ $user->is_admin ? 'Yes' : 'No' }}
            <a href="{{ route('admin.users.edit', $user->id) }}">✏️ Edit</a>

            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">🗑️ Delete</button>
            </form>
        </li>
    @endforeach
</ul>

</body>
</html>
