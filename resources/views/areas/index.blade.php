@extends('layouts.dashboard')

@section('title', 'Manage Areas')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Daftar Area Kampus</h1>
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<div class="flex justify-end mb-4">
        <a href="{{ route('areas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Tambah Area
        </a>
    </div>
<table class="min-w-full table-auto border-collapse border text-left">
    <thead>
        <tr>
            <th class="px-4 py-2 border-b">Nama Area</th>
            <th class="px-4 py-2 border-b">Level Kebersihan</th>
            <th class="px-4 py-2 border-b">Level Aktivitas</th>
            <th class="px-4 py-2 border-b">Prioritas Pembersihan</th>
            <th class="px-4 py-2 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($areas as $area)
            <tr>
                <td class="px-4 py-2 border-b">{{ $area->name }}</td>
                <td class="px-4 py-2 border-b">{{ $area->cleanliness_level }}</td>
                <td class="px-4 py-2 border-b">{{ $area->activity_level }}</td>
                <td class="px-4 py-2 border-b">{{ $area->priority_score ?? 'Belum dihitung' }}</td>
                <td class="px-4 py-2 border-b">
                    <form action="{{ route('areas.calculatePriority', $area->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Hitung Prioritas Pembersihan
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
