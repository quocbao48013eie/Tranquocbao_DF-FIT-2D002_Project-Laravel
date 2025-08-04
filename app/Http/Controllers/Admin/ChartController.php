<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostJob;
use App\Models\User;
use Carbon\Carbon;

class ChartController extends Controller
{
public function jobChart()
{
    $currentYear = now()->year;

    $data = PostJob::selectRaw('MONTH(created_at) as month, COUNT(*) as total_jobs')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $monthlyJobs = array_fill(1, 12, 0);
    foreach ($data as $item) {
        $monthlyJobs[$item->month] = $item->total_jobs;
    }

    return view('admin.pages.job_chart', compact('monthlyJobs'));
}
public function userChart()
{
    $currentYear = now()->year;

    $data = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total_jobs')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $monthlyJobs = array_fill(1, 12, 0);
    foreach ($data as $item) {
        $monthlyJobs[$item->month] = $item->total_jobs;
    }

    return view('admin.pages.user_chart', compact('monthlyJobs'));
}
}
