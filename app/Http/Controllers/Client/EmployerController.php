<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $location = $request->location . ' ' . $request->region;
            $user = Auth::user();

            if (!$user || !$user->employer) {
                return back()->with('error', 'Bạn không có quyền đăng tin tuyển dụng.');
            }

            $postJob = new PostJob();
            $postJob->employer_id = $user->employer->id;
            $postJob->title = $request->title;
            $postJob->description = $request->description;
            $postJob->salary = $request->salary;
            $postJob->location = $location;
            $postJob->job_type = $request->job_type;
            $postJob->deadline = $request->deadline;
            $postJob->save();

            return redirect()->route('client.index')->with('success', 'Đăng tin thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }
}
