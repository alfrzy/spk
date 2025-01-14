@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Welcome, {{ Auth::user()->name }}!</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Example -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold">Total Areas</h2>
            <p class="text-gray-600">{{ $totalAreas }} areas</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold">Cleaning Schedules</h2>
            <p class="text-gray-600">{{ $totalSchedules }} schedules</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold">Reports Generated</h2>
            <p class="text-gray-600">{{ $totalReports }} reports</p>
        </div>
    </div>
        <h1 class="text-2xl font-bold mb-6 p-6">Prioritas Pembersihan Area Kampus</h1>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Area</th>
                    <th class="px-4 py-2">Skor Prioritas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td class="px-4 py-2 text-center">{{ $area->name }}</td>
                        <td class="px-4 py-2 text-center">{{ $area->priority_score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
