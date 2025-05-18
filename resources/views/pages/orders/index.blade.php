@extends('layouts.app')

@section('content')
    <h1 class="mb-4">My Reservations</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <p>You have no reservations yet.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Room Info</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Nights</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        {{ $order->room->roomtype->name ?? 'N/A' }}
                        ({{ $order->room->no_beds }} beds)
                    </td>
                    <td>{{ $order->check_in->format('d.m.Y') }}</td>
                    <td>{{ $order->check_out->format('d.m.Y') }}</td>
                    <td>{{ $order->stayDays }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
