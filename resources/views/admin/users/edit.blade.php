@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Edit User</h1>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Is Admin</label>
            <select name="is_admin" class="form-control">
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
