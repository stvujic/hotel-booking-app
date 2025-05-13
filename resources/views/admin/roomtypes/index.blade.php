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
        <li>{{ $type->id }} – {{ $type->name }}</li>
    @endforeach
</ul>

</body>
</html>
