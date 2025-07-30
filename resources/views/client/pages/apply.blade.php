@extends('client.layout.master')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Apply for: {{ $job->title }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.apply_job', $job->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="cv">Upload CV <span class="text-danger">*</span></label>
                                    <input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx"
                                        required>
                                    <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX</small>
                                </div>

                                <div class="form-group">
                                    <label for="cover_letter">Cover Letter (optional)</label>
                                    <textarea name="cover_letter" class="form-control" rows="5" placeholder="Write your cover letter here..."></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Submit Application</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
