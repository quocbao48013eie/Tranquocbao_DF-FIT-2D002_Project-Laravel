<?php

namespace App\Http\Middleware;

use App\Models\JobApplication;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role != 'employer') {
            abort(403, 'Bạn không có quyền truy cập đơn ứng tuyển này.');
        }

        $applicationId = $request->route('id');
        if ($applicationId) {
            $application = JobApplication::with('job')->find($applicationId);
            if (!$application || !$application->job || $application->job->employer->user_id != Auth::id()
            ) {
                abort(403, 'Bạn không có quyền truy cập đơn ứng tuyển này.');
            }
        }

        return $next($request);
    }
}
