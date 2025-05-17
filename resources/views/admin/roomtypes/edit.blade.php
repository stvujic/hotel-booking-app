@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Edit Room Type</h1>

    <form method="POST" action="{{ route('admin.roomtypes.update', $roomtype->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Room Type Name</label>
            <input type="text" id="name" name="name" value="{{ $roomtype->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.roomtypes.index') }}" class="btn btn-secondary">Back to list</a>
    </form>
@endsection
