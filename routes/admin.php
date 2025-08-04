
<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\JopPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('admin/layout', function (){
    return view('admin.layout.master');
});

Route::get('job-chart', [ChartController::class, 'jobChart'])->name('admin.job-chart')->middleware(CheckIsAdmin::class);
Route::get('user-chart', [ChartController::class, 'userChart'])->name('admin.user-chart')->middleware(CheckIsAdmin::class);

Route::prefix('admin')->name('admin.')->middleware(CheckIsAdmin::class)->group(function () {
    Route::resource('jobposts', JopPostController::class);
});
Route::resource('admin/user', UserController::class)->names('admin.user')->middleware(CheckIsAdmin::class);
Route::post('admin/user/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore')->middleware(CheckIsAdmin::class);

