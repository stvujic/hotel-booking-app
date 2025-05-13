<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room Types</title>
</head>
<body>
<h1>Room Types</h1>

<ul>
    @foreach($roomtypes as $type)
        <li>{{ $type->id }} – {{ $type->name }}</li>
    @endforeach
</ul>
</body>
</html>
