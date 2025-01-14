<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('area')->get(); // Ambil jadwal dengan area
        return view('schedules.index', compact('schedules'));
    }

}

