<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\JobApplication;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function normalizeString($string)
    {
        $string = preg_replace('/\s+/', '', $string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
        return preg_replace('/[^A-Za-z0-9]/', '', $string);
    }

   public function index(Request $request)
{
    $itemPerPage = config('pagination.item_per_page');
    $keyword = $request->keyword ? $this->normalizeString($request->keyword) : null;
    $region = $request->region ? $this->normalizeString($request->region) : null;

    if (!$keyword && !$region && $request->job_type === null) {
        $datas = PostJob::query()->paginate($itemPerPage);
    } else {
        $query = PostJob::query();

        if ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        }

        if ($region) {
            $query->where('location', 'LIKE', '%' . $region . '%');
        }

        if (!is_null($request->job_type) && $request->job_type !== '') {
            $query->where('job_type', $request->job_type);
        }

        $datas = $query->paginate($itemPerPage)->withQueryString();
    }

    return view('client.pages.index', ['datas' => $datas]);
}


    public function detail(PostJob $jobDetail)
    {
        return view('client.pages.job_single')->with('data', $jobDetail);
    }
    
    public function showApplyForm($id)
    {
        $job = PostJob::findOrFail($id);
        return view('client.pages.apply', compact('job'));
    }
    public function applyJob(Request $request, $jobId)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->first();

        if (!$candidate) {
            return back()->with('error', 'Không tìm thấy thông tin ứng viên.');
        }

        // Kiểm tra đã ứng tuyển chưa
        $alreadyApplied = JobApplication::where('candidate_id', $candidate->id)
            ->where('job_post_id', $jobId)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('warning', 'Bạn đã ứng tuyển công việc này rồi.');
        }

        // Upload file CV với tên không trùng
        $cvFile = $request->file('cv');
        $filename = time() . '_' . uniqid() . '.' . $cvFile->getClientOriginalExtension();
        $cvPath = $cvFile->storeAs('cv', $filename, 'public'); // lưu ở storage/app/public/cv

        // Tạo đơn ứng tuyển
        JobApplication::create([
            'candidate_id' => $candidate->id,
            'job_post_id' => $jobId,
            'cover_letter' => $request->cover_letter,
            'cv_file' => $cvPath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('client.index')
            ->with('success', 'Ứng tuyển thành công!');
    }
    public function viewApplication($id)
    {
        $application = JobApplication::with('job')->findOrFail($id);
        return view('client.pages.applications', compact('application'));
    }
}
