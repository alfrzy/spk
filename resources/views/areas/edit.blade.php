@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto p-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Edit Area</h1>

        <form action="{{ route('areas.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Area Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $area->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cleanliness_level" class="block text-sm font-medium text-gray-700">Cleanliness Level</label>
                <input type="number" id="cleanliness_level" name="cleanliness_level" value="{{ old('cleanliness_level', $area->cleanliness_level) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('cleanliness_level')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="activity_level" class="block text-sm font-medium text-gray-700">Activity Level</label>
                <input type="number" id="activity_level" name="activity_level" value="{{ old('activity_level', $area->activity_level) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('activity_level')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Area</button>
        </form>
    </div>
@endsection
