<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostJob;
use Illuminate\Http\Request;

class JopPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemPerPage = config('pagination.item_per_page');
        $datas = PostJob::paginate($itemPerPage);
        

        return view('admin.pages.job_post.index', ['datas'=> $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostJob $jobpost)
    {
        $jobpost->delete();
        $msg = $jobpost ? 'success' : 'fail';
        return redirect()->route('admin.jobposts.index')->with('msg',$msg);
    }
}
