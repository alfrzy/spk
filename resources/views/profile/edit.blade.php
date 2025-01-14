@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <!-- Name and Email Fields -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full">
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full">
    </div>

    <!-- Role Field (only for Admin) -->
    @if($user->role == 0)
    <div class="mb-4">
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <select name="role" id="role" class="mt-1 block w-full">
            @foreach($roles as $role => $roleName)
                <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ $roleName }}</option>
            @endforeach
        </select>
    </div>
    @endif

    <!-- Submit Button -->
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
</form>
@endsection
