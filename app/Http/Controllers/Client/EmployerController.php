<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function store(Request $request)
    {

            $request->validate([
                'title'       => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:20'],
                'salary'      => ['required', 'numeric', 'min:0'],
                'location'    => ['required', 'string'],
                'region'      => ['required', 'string'],
                'job_type'    => ['required'],
                'deadline'    => ['required', 'date', 'after_or_equal:today'],
            ], [
                'title.required'       => 'Vui lòng nhập tiêu đề công việc.',
                'description.required' => 'Vui lòng nhập mô tả công việc.',
                'description.min'      => 'Mô tả công việc phải ít nhất 20 ký tự.',
                'salary.required'      => 'Vui lòng nhập mức lương.',
                'salary.numeric'       => 'Lương phải là số.',
                'salary.min'           => 'Lương không được âm.',
                'location.required'    => 'Vui lòng nhập địa điểm.',
                'region.required'      => 'Vui lòng chọn khu vực.',
                'job_type.required'    => 'Vui lòng chọn loại công việc.',
                'job_type.in'          => 'Loại công việc không hợp lệ.',
                'deadline.required'    => 'Vui lòng nhập hạn chót nộp hồ sơ.',
                'deadline.date'        => 'Hạn chót phải là ngày hợp lệ.',
                'deadline.after_or_equal' => 'Hạn chót phải từ hôm nay trở đi.',
            ]);
           
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
       
    }
    public function viewApplication()
    {
        $userId = Auth::id();

        $applications = JobApplication::whereHas('job.employer', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with(['job', 'job.employer'])->get();

        return view('client.pages.applications', compact('applications'));
    }

    public function viewApplicationDetail($id)
    {
        $application = JobApplication::with(['candidate.user'])->findOrFail($id);

        return view('client.pages.applications_detail', compact('application'));
    }
}
