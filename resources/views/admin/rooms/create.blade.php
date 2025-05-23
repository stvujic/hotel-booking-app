@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Add New Room</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.rooms.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Room Type</label>
            <select name="room_type_id" class="form-control">
                @foreach($roomtypes as $type)
                    <option value="{{ $type->id }}" {{ old('room_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Beds</label>
            <input type="number" name="no_beds" class="form-control" value="{{ old('no_beds') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Total Rooms</label>
            <input type="number" name="total_room" class="form-control" value="{{ old('total_room') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Price (€)</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image (filename)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Back to list</a>
    </form>
@endsection
