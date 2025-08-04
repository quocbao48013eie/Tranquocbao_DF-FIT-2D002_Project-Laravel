<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemPerPage = config('pagination.item_per_page');
        $datas = User::withTrashed()->paginate($itemPerPage);
        return view('admin.pages.user.index', ['datas' => $datas]);
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
    public function edit(User $user)
    {
        return view('admin.pages.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')
            ],
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email này đã được sử dụng.',
        ]);

        if ($user->super_role) {
            return redirect()->route('admin.user.index')
                ->with('msg', 'Không thể chỉnh sửa người dùng có quyền quản trị cao nhất!');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = now();
        $check = $user->save();

        $msg = $check ? 'Cập nhật thành công.' : 'Cập nhật thất bại.';
        $type = $check ? 'success' : 'fail';

        return redirect()->route('admin.user.index')
            ->with([
                'msg' => $msg,
                'type' => $type
            ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->super_role ) {
            return redirect()->route('admin.user.index')
                ->with('msg', 'Không thể xóa người dùng có quyền quản trị cao nhất!');
        }
        $user->delete();
        if ($user->employer) {
            $user->employer->delete();
        }
        return redirect()->route('admin.user.index')
            ->with([
                'msg' => 'Đã xóa thành công.',
                'type' => 'success'
            ]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        $employer = $user->employer()->withTrashed()->first();
        $candidate = $user->candidate()->withTrashed()->first();
        if ($employer) {
            $employer->restore();
        }
        if ($candidate) {
            $candidate->restore();
        }
        return redirect()->route('admin.user.index')
            ->with([
                'msg' => 'Đã khôi phục thành công.',
                'type' => 'success'
            ]);
    }
}
