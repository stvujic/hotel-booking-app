<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room Types</title>
</head>
<body>

@if(session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<h1>Room Types</h1>

<a href="{{ route('admin.roomtypes.create') }}">➕ Add New Room Type</a>
<br><br>

<ul>
    @foreach($roomtypes as $type)
        <li>
            {{ $type->id }} – {{ $type->name }}
            <a href="{{ route('admin.roomtypes.edit', $type->id) }}">✏️ Edit</a>

            <form action="{{ route('admin.roomtypes.destroy', $type->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
            </form>
        </li>
    @endforeach
</ul>

</body>
</html>
