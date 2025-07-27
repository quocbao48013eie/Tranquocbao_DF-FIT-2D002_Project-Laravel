@extends('client.layout.master')
@section('content')
    <!-- HOME -->

    <form action="{{ route('client.store') }}" method="post" id="postjob">
        @csrf
        <section class="section-hero overlay inner-page bg-image"
            style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Post A Job</h1>
                        <div class="custom-breadcrumbs">
                            <a href="{{ route('client.index') }}">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Post a Job</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="site-section">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2>Post A Job</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>

                        <div class="form-group">
                            <label for="job-title">Job Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                id="job-title" placeholder="Product Designer">
                        </div>
                        <div class="form-group">
                            <label for="job-location">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                id="job-location" placeholder="e.g. New York">
                        </div>

                        <div class="form-group">
                            <label for="job-region">Job Region</label>
                            <select class="selectpicker border rounded" id="job-region" data-style="btn-black"
                                data-width="100%" data-live-search="true" name="region" title="Select Region">
                                <option {{ old('region') === 'HCM' ? 'selected' : '' }} value="HCM">Hồ Chí Minh</option>
                                <option {{ old('region') === 'HN' ? 'selected' : '' }} value="HN">Hà Nội</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job-type">Job Type</label>
                            <select class="selectpicker border rounded" name="job_type" id="job-type"
                                data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                                <option {{ old('job_type') === '0' ? 'selected' : '' }} value="0">Part Time</option>
                                <option {{ old('job_type') === '1' ? 'selected' : '' }} value="1">Full Time</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="description">Job Description</label>
                            <div id="editor-1" style="height: 200px;"></div>
                            <input type="hidden" name="description" id="description" value="{{ old('description') }}">
                        </div>


                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control" name="salary" value="{{ old('salary') }}"
                                id="salary" placeholder="20">
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}"
                                id="deadline">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">

                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                {{-- <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-open_in_new mr-2"></span>Preview</a> --}}
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-block btn-primary btn-md" id="save-btn">Save
                                    Job</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('my-js')
<script src="{{ asset('client/js/quill.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const quill = new Quill('#editor-1', {
        theme: 'snow'
    });

    const saveBtn = document.querySelector('#save-btn');
    const hiddenInput = document.querySelector('#description');
    const form = document.querySelector('#postjob');

    saveBtn.addEventListener('click', function () {
        const content = quill.root.innerHTML;
        console.log("Nội dung Quill Editor:", content);

        hiddenInput.value = content;

        form.submit();
    });
});
</script>
@endsection

