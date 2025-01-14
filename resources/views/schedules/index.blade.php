@extends('layouts.dashboard')

@section('title', 'Schedules')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Schedules</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Area</th>
                <th>Cleaner Name</th>
                <th>Schedule Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->area->name }}</td>
                    <td>{{ $schedule->cleaner_name }}</td>
                    <td>{{ $schedule->schedule_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
