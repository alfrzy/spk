@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Jadwal Pembersihan</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Area</th>
                <th class="border border-gray-300 px-4 py-2">Skor Priotitas</th>
                <th class="border border-gray-300 px-4 py-2">Jadwal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->area->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->area->priority_score }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->schedule_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
