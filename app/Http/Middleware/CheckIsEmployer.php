<?php

namespace App\Http\Middleware;

use App\Models\JobApplication;
use App\Models\PostJob;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsEmployer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'employer') {
            abort(403, 'Bạn không có quyền truy cập trang này.');
        }

        switch (true) {
            case $request->routeIs('client.applications_detail'):
            case $request->routeIs('client.applications_detail.accept'):
            case $request->routeIs('client.applications_detail.refuse'):
                $applicationId = $request->route('id');
                $application = JobApplication::with('job')->find($applicationId);
                if (!$application || !$application->job || $application->job->employer->user_id !== Auth::id()) {
                    abort(403, 'Bạn không có quyền truy cập đơn ứng tuyển này.');
                }
                break;

            case $request->routeIs('remove_job'):
                $jobId = $request->route('id');
                $job = PostJob::find($jobId);
                if (!$job || $job->employer->user_id !== Auth::id()) {
                    abort(403, 'Bạn không có quyền xóa job này.');
                }
                break;

            default:
                break;
        }

        return $next($request);
    }
}
