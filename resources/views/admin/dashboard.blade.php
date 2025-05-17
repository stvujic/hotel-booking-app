@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Admin Dashboard</h1>

    {{-- Statistic Cards --}}
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card text-bg-primary text-center">
                <div class="card-body">
                    <h5 class="card-title">Room Types</h5>
                    <p class="fs-4 mb-0">{{ \App\Models\RoomType::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success text-center">
                <div class="card-body">
                    <h5 class="card-title">Rooms</h5>
                    <p class="fs-4 mb-0">{{ \App\Models\Room::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning text-center">
                <div class="card-body">
                    <h5 class="card-title">Reservations</h5>
                    <p class="fs-4 mb-0">{{ \App\Models\Order::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-dark text-center">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="fs-4 mb-0">{{ \App\Models\User::where('is_admin', false)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Navigation --}}
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('admin.roomtypes.index') }}" class="btn btn-outline-primary w-100">Manage Room Types</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-success w-100">Manage Rooms</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-warning w-100">Manage Reservations</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark w-100">Manage Users</a>
        </div>
    </div>
@endsection
