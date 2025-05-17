@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Profile</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

    <hr class="my-5">

    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Delete Account</button>
    </form>
@endsection
