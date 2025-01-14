<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Schedule;
use App\Models\Report;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $areas = Area::all();
    $totalAreas = Area::count();
    $totalSchedules = Schedule::count();
    $totalReports = Report::count(); // Hitung total data report
    return view('dashboard', compact('totalAreas', 'totalSchedules', 'totalReports', 'areas'));
}

public function calculatePriority()
    {
        // Ambil semua data area
        $areas = Area::all();

        // Cari nilai maksimum kebersihan dan aktivitas
        $maxCleanliness = $areas->max('cleanliness_level');
        $maxActivity = $areas->max('activity_level');

        // Jika maxCleanliness atau maxActivity adalah 0, beri nilai default untuk menghindari pembagian dengan 0
        if ($maxCleanliness == 0) $maxCleanliness = 1; // Nilai default untuk mencegah pembagian dengan 0
        if ($maxActivity == 0) $maxActivity = 1; // Nilai default untuk mencegah pembagian dengan 0

        // Hitung skor untuk masing-masing area
        $results = $areas->map(function ($area) use ($maxCleanliness, $maxActivity) {
            $cleanlinessWeight = 0.4; // Bobot kebersihan
            $activityWeight = 0.6;    // Bobot aktivitas

            // Hitung skor berdasarkan bobot
            $score = 
                ($area->cleanliness_level / $maxCleanliness * $cleanlinessWeight) +
                ($area->activity_level / $maxActivity * $activityWeight);

            return [
                'id' => $area->id,
                'name' => $area->name,
                'score' => $score,
            ];
        });

        // Urutkan hasil berdasarkan skor tertinggi
        $sortedResults = $results->sortByDesc('score');

        // Kembalikan hasil sebagai response JSON
        return response()->json($sortedResults);
    }
}

