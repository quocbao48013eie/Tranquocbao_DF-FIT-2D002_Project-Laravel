@extends('client.layout.master')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Product Designer</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ route('client.index') }}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Product Designer</strong></span>
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
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            @if ($data->employer->company_logo)
                                <img src="{{ asset($data->employer->company_logo) }}"
                                    alt="Free Website Template by Free-Template.co" class="img-fluid"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <img src="{{ asset('client/df.jpg') }}" alt="Free Website Template by Free-Template.co"
                                    class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                        </div>
                        <div>
                            <h2>{{ $data->title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"><a href="{{route('client.company_detail', $data->employer_id)}}"></span>{{ $data->employer->company_name }}</span></a>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{ $data->location }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $data->job_type ? 'Full Time' : 'Part Time' }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-light btn-md"><span
                                    class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ Auth::check() ? route('client.apply_job_form', $data->id) : route('login') }}"
                                class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"><img src="{{ asset('client/images/job_single_img_1.jpg') }}" alt="Image"
                                class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Job Description</h3>
                        {!! $data->description !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Created At:</strong> {{ $data->created_at }}</li>
                            <li class="mb-2"><strong class="text-black">Employment Status:</strong>
                                {{ $data->job_type ? 'Full Time' : 'Part Time' }}</li>
                            <li class="mb-2"><strong class="text-black">Job Location:</strong> {{ $data->location }}</li>
                            <li class="mb-2"><strong class="text-black">Salary:</strong> {{ $data->salary }}</li>
                            <li class="mb-2"><strong class="text-black">Gender:</strong> Any</li>
                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong>
                                {{ \Carbon\Carbon::parse($data->deadline)->format('d/m/Y') }}
                            </li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                        <div class="px-3">
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">


            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero
                                dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum
                                repudiandae.&rdquo;</p>
                            <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('client/images/person_transparent_2.png') }}" alt="Image"
                            class="img-fluid mb-0">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero
                                dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum
                                repudiandae.&rdquo;</p>
                            <p><cite> &mdash; Chris Peters, @Google</cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('client/images/person_transparent.png') }}" alt="Image"
                            class="img-fluid mb-0">
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
                    <h2 class="text-white">Get The Mobile Apps</h2>
                    <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                    <p class="mb-0">
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-apple mr-3"></span>App Store</a>
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
                <div class="col-md-6 ml-auto align-self-end">
                    <img src="{{ asset('client/images/apps.png') }}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
