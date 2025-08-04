<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Mail\AcceptCV;
use App\Mail\RefuseCV;
use App\Models\Candidate;
use App\Models\JobApplication;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmployerController extends Controller
{
    public function store(JobRequest $request)
    {
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

        $applications = JobApplication::where('status', 'pending')
            ->whereHas('job.employer', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->with(['job', 'job.employer'])->get();

        return view('client.pages.applications', compact('applications'));
    }

    public function viewApplicationDetail($id)
    {
        $application = JobApplication::with(['candidate.user'])->findOrFail($id);

        return view('client.pages.applications_detail', compact('application'));
    }

    public function acceptCV($id)
    {
        $application  = JobApplication::findOrFail($id);
        $application->status = 'accept';
        $application->save();

        $candidate = Candidate::find($application->candidate_id);
        Mail::to($candidate->user->email)->send(new AcceptCV($candidate));
        return view('client.pages.mail_form', ['candidate' => $candidate]);
    }

    public function refuseCV($id)
    {
        $application  = JobApplication::findOrFail($id);
        $application->status = 'refuse';
        $application->save();
        $candidate = Candidate::find($application->candidate_id);
        Mail::to($candidate->user->email)->send(new RefuseCV($candidate));
        return view('client.pages.refuse_mail', ['candidate' => $candidate]);
    }

    public function jobPost()
    {
        $employer_id = Auth::user()->employer->id;

        $datas = PostJob::where('employer_id', $employer_id)->get();

        return view('client.pages.job_posted', ['datas' => $datas]);
    }

    public function removeJob($id)
    {
        $rmJob = PostJob::find($id);
        $rmJob->delete();

        return redirect()->route('client.job_post');
    }

    public function showEditJob($id)
    {
        $job = PostJob::findOrFail($id);

        if ($job->employer_id != Auth::user()->employer->id) {
            abort(403, 'Unauthorized');
        }

        $locationParts = explode(' ', $job->location);
        $region = array_pop($locationParts);
        $location = implode(' ', $locationParts);

        $job->region = $region;
        $job->location = $location;

        return view('client.pages.edit_job', ['job' => $job]);
    }

    public function editJob(JobRequest $request, $id)
    {
        $location = $request->location . ' ' . $request->region;
        $user = Auth::user();

        $updateJob = PostJob::findOrFail($id);
        $updateJob->employer_id = $user->employer->id;
        $updateJob->title = $request->title;
        $updateJob->description = $request->description;
        $updateJob->salary = $request->salary;
        $updateJob->location = $location;
        $updateJob->job_type = $request->job_type;
        $updateJob->deadline = $request->deadline;
        $updateJob->save();

        return redirect()->route('client.job_post');
    }
}
