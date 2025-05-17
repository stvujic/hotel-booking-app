@extends('layouts.admin')

@section('content')
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
                <td>
                    {{ $order->room->roomtype->name ?? 'N/A' }}<br>
                    {{ $order->room->no_beds ?? '-' }} beds<br>
                    €{{ $order->room->price ?? '-' }}
                </td>
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
@endsection
