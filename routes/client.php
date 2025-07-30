<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\CandidateController;
use App\Http\Controllers\Client\EmployerController;
use App\Http\Controllers\Client\GoogleController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Middleware\CheckIsEmployer;
use Illuminate\Support\Facades\Route;

Route::get('/', [CandidateController::class, 'index'])->name('client.index');

Route::get('about', function () {
    return view('client.pages.about');
})->name('client.about');


Route::get('job_single/{jobDetail}', [CandidateController::class, 'detail'])->name('client.job_single');

Route::get('post_job', function () {
    return view('client.pages.post_job');
})->name('client.post_job')->middleware(CheckIsEmployer::class);

Route::get('service', function () {
    return view('client.pages.service');
})->name('client.service');

Route::get('service_single', function () {
    return view('client.pages.service_single');
})->name('client.service_single');

Route::get('blog', function () {
    return view('client.pages.blog');
})->name('client.blog');

Route::get('blog_single', function () {
    return view('client.pages.blog_single');
})->name('client.blog_single');

Route::get('portfolio', function () {
    return view('client.pages.portfolio');
})->name('client.portfolio');

Route::get('portfolio_single', function () {
    return view('client.pages.portfolio_single');
})->name('client.portfolio_single');

Route::get('testimonials', function () {
    return view('client.pages.testimonials');
})->name('client.testimonials');

Route::get('faq', function () {
    return view('client.pages.faq');
})->name('client.faq');

Route::get('gallery', function () {
    return view('client.pages.gallery');
})->name('client.gallery');

Route::get('contact', function () {
    return view('client.pages.contact');
})->name('client.contact');
Route::get('company_register', function () {
    return view('client.pages.company_register');
})->name('client.company_register');

Route::get('/choose_register', function () {
    return view('client.pages.choose_register');
})->name('client.choose_register');

Route::get('client/profile',[ProfileController::class, 'show'])->name('client.profile');

Route::post('store', [EmployerController::class, 'store'])->name('client.store');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
Route::get('/apply-job/{id}', [CandidateController::class, 'showApplyForm'])->name('client.apply_job_form');
Route::post('/apply-job/{id}', [CandidateController::class, 'applyJob'])->name('client.apply_job');
Route::get('applications', [EmployerController::class, 'viewApplication'])->name('client.applications')->middleware(CheckIsEmployer::class);
Route::get('applications_detail/{id}', [EmployerController::class, 'viewApplicationDetail'])->name('client.applications_detail')->middleware(CheckIsEmployer::class);
Route::get('company_detail/{id}', [CandidateController::class, 'viewCompany'])->name('client.company_detail')->middleware(CheckIsEmployer::class);
Route::get('google/redirect', [GoogleController::class, 'redirect'])->name('client.google.redirect');
Route::get('google/callback', [GoogleController::class, 'callback'])->name('client.google.callback');