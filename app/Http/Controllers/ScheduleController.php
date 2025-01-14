<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::join('areas', 'schedules.area_id', '=', 'areas.id')
        ->orderBy('areas.priority_score') // Mengurutkan berdasarkan priority_score dari tabel areas
        ->orderByDesc('schedules.schedule_date') // Mengurutkan berdasarkan schedule_date dari tabel schedules
        ->get(['schedules.*', 'areas.name as area_name', 'areas.priority_score']); // Ambil kolom yang diperlukan

return view('schedules.index', compact('schedules'));
    }

    public function generateSchedule(Request $request)
{
    // Validasi input
    $request->validate([
        'areas' => 'required|array',
        'areas.*.id' => 'required|exists:areas,id',
        'areas.*.cleanliness' => 'required|numeric|min:1|max:10',
        'areas.*.activity_level' => 'required|numeric|min:1|max:10',
    ]);

    // Ambil data area
    $areas = $request->input('areas');

    // Hitung prioritas
    $prioritizedAreas = collect($areas)->map(function ($area) {
        $priorityScore = ($area['cleanliness'] * 0.7) + ($area['activity_level'] * 0.3);
        return [
            'id' => $area['id'],
            'priority_score' => $priorityScore,
        ];
    })->sortByDesc('priority_score');

    // Generate jadwal pembersihan
    $schedules = [];
    $date = now();
    foreach ($prioritizedAreas as $key => $area) {
        $schedules[] = Schedule::create([
            'area_id' => $area['id'],
            'cleaner_name' => 'Cleaner ' . ($key + 1),
            'schedule_date' => $date->addDay(),
        ]);
    }

    return response()->json([
        'message' => 'Schedule generated successfully',
        'schedules' => $schedules,
    ]);
}


}

