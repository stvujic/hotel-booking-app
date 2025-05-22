@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Add New Room Type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.roomtypes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Room Type Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.roomtypes.index') }}" class="btn btn-secondary">Back to list</a>
    </form>
@endsection
