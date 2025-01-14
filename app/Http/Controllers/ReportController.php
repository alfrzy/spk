<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('area')->get(); // Ambil laporan dengan area
        return view('reports.index', compact('reports'));
    }
}
