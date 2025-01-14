@extends('layouts.dashboard')

@section('title', 'Reports')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Reports</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Area</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->area->name }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
