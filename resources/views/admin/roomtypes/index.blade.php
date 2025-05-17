@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Room Types</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.roomtypes.create') }}" class="btn btn-success mb-3">➕ Add New Room Type</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Room Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roomtypes as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="{{ route('admin.roomtypes.edit', $type->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                    <form action="{{ route('admin.roomtypes.destroy', $type->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
