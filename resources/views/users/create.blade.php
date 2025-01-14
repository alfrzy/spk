@extends('layouts.dashboard')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Pengguna Baru</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold">Nama</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-semibold">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Tambah Pengguna</button>
    </form>
</div>
@endsection
