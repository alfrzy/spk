<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('areas', AreaController::class);
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('areas/priorities', [AreaController::class, 'calculatePriority'])->name('areas.priorities');
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

Route::post('/areas/{area}/calculatePriority', [AreaController::class, 'calculatePriority'])->name('areas.calculatePriority');
Route::get('/calculate-priority', [DashboardController::class, 'calculatePriority']);

Route::post('/schedules/generate', [ScheduleController::class, 'generateSchedule']);
Route::get('/schedules', [ScheduleController::class, 'index']);

require __DIR__.'/auth.php';
