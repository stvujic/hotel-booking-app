<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Reservations</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Room</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Nights</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'N/A' }} {{ $order->user->last_name ?? '' }}</td>
                <td>{{ $order->room->name ?? 'N/A' }}</td>
                <td>{{ optional($order->check_in)->format('d.m.Y') }}</td>
                <td>{{ optional($order->check_out)->format('d.m.Y') }}</td>
                <td>{{ $order->stayDays }}</td>
                <td>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">🗑 Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
