@extends('client.layout.master')
@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
@endif
@if(session('warning'))
    <div class="alert alert-warning mt-3">{{ session('warning') }}</div>
@endif

<div class="container my-5">
    <h2>Apply for: {{ $job->title }}</h2>

    <form action="{{ route('client.apply_job', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="cv">Upload CV (PDF, DOCX):</label>
            <input type="file" name="cv" class="form-control-file" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="form-group">
            <label for="cover_letter">Cover Letter (optional):</label>
            <textarea name="cover_letter" rows="4" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Submit Application</button>
    </form>
</div>
@endsection
