<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data area
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat area baru
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'cleanliness_level' => 'required|integer',
            'activity_level' => 'required|integer',
        ]);

        // Hitung skor prioritas menggunakan SAW
        $priorityScore = $this->calculatePriorityScore($request->cleanliness_level, $request->activity_level);

        // Simpan data area
        $area = Area::create([
            'name' => $request->name,
            'cleanliness_level' => $request->cleanliness_level,
            'activity_level' => $request->activity_level,
            'priority_score' => $priorityScore,
        ]);

        // Tambahkan jadwal otomatis berdasarkan skor prioritas
        Schedule::create([
            'area_id' => $area->id,
            'cleaner_name' => null, // Admin akan mengisi ini nanti
            'schedule_date' => now()->addDays($priorityScore), // Urutkan berdasarkan skor prioritas
        ]);

        return redirect()->route('areas.index')->with('success', 'Area dan jadwal berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman detail area tertentu.
     */
    public function show(string $id)
    {
        // Tampilkan detail area berdasarkan ID
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk edit area
        $area = Area::findOrFail($id);
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'cleanliness_level' => 'required|integer',
            'activity_level' => 'required|integer',
        ]);

        // Ambil area yang akan diupdate
        $area = Area::findOrFail($id);

        // Hitung ulang priority_score setelah data diperbarui
        $priorityScore = $this->calculatePriorityScore($request->cleanliness_level, $request->activity_level);

        // Update data area
        $area->update([
            'name' => $request->name,
            'cleanliness_level' => $request->cleanliness_level,
            'activity_level' => $request->activity_level,
            'priority_score' => $priorityScore,
        ]);

        return redirect()->route('areas.index')->with('success', 'Area berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus area berdasarkan ID
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Area berhasil dihapus.');
    }

    /**
     * Menghitung priority_score berdasarkan metode SAW.
     */
    public function calculatePriorityScore($cleanliness_level, $activity_level)
    {
        // Ambil semua data area untuk perhitungan SAW
        $areas = Area::all();

        // Cari nilai maksimum untuk cleanliness_level dan activity_level
        $maxCleanliness = $areas->max('cleanliness_level');
        $maxActivity = $areas->max('activity_level');

        // Jika nilai maksimum kebersihan atau aktivitas adalah 0, beri nilai default untuk menghindari pembagian dengan 0
        if ($maxCleanliness == 0) $maxCleanliness = 1;
        if ($maxActivity == 0) $maxActivity = 1;

        // Bobot kriteria (tentukan berdasarkan kebutuhan)
        $cleanlinessWeight = 0.4;
        $activityWeight = 0.6;

        // Normalisasi dan hitung skor prioritas untuk area ini
        $normalizedCleanliness = $cleanliness_level / $maxCleanliness;
        $normalizedActivity = $activity_level / $maxActivity;

        // Hitung skor prioritas akhir
        $priorityScore = 
            ($normalizedCleanliness * $cleanlinessWeight) +
            ($normalizedActivity * $activityWeight);

        return $priorityScore;
    }
}
