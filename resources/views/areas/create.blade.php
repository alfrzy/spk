@extends('layouts.dashboard')

@section('title', 'Tambah Area')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Tambah Area Baru</h1>
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <!-- Nama Area -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Area</label>
            <input type="text" name="name" id="name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                required>
        </div>
        <!-- Tingkat Kebersihan -->
        <div class="mb-4">
            <label for="cleanliness_level" class="block text-sm font-medium text-gray-700">Tingkat Kebersihan (1-5)</label>
            <input type="number" name="cleanliness_level" id="cleanliness_level" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                min="1" max="5" required>
        </div>
        <!-- Tingkat Aktivitas -->
        <div class="mb-4">
            <label for="activity_level" class="block text-sm font-medium text-gray-700">Tingkat Aktivitas (1-5)</label>
            <input type="number" name="activity_level" id="activity_level" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                min="1" max="5" required>
        </div>
        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
