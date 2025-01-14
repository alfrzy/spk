<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        $totalAreas = Area::count(); 
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cleanliness_level' => 'required|integer|min:1|max:5',
            'activity_level' => 'required|integer|min:1|max:5',
        ]);

        // Simpan data ke database
        Area::create($validated);

        // Redirect ke halaman daftar area dengan pesan sukses
        return redirect()->route('areas.index')->with('success', 'Area berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function calculatePriority(Area $area)
{
    // Ambil semua data area
    $areas = Area::all();

    // Cari nilai maksimum kebersihan dan aktivitas
    $maxCleanliness = $areas->max('cleanliness_level');
    $maxActivity = $areas->max('activity_level');

    // Jika maxCleanliness atau maxActivity adalah 0, beri nilai default untuk menghindari pembagian dengan 0
    if ($maxCleanliness == 0) $maxCleanliness = 1;
    if ($maxActivity == 0) $maxActivity = 1;

    // Hitung skor untuk masing-masing area yang dipilih
    $cleanlinessWeight = 0.4;
    $activityWeight = 0.6;

    $score = 
        ($area->cleanliness_level / $maxCleanliness * $cleanlinessWeight) +
        ($area->activity_level / $maxActivity * $activityWeight);

    // Update area dengan skor perhitungan prioritas
    $area->update([
        'priority_score' => $score,
    ]);

    // Redirect kembali ke halaman areas dengan pesan sukses
    return redirect()->route('areas.index')->with('success', 'Prioritas pembersihan area berhasil dihitung.');
}


}
