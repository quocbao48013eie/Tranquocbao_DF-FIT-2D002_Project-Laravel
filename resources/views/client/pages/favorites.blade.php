@extends('client.layout.master')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">

        <div class="container">
            <div class="bg-white rounded-4 shadow p-4">
                <h2 class="mb-4 text-primary fw-bold">
                    <i class="bi bi-heart-fill text-danger"></i> Công việc yêu thích
                </h2>

                @forelse ($datas as $data)
                    <div class="card mb-4 shadow-sm border-0 rounded-4 position-relative job-card hover-shadow">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2 text-center p-3">
                                @if ($data->job->employer->company_logo)
                                    <img src="{{ asset($data->job->employer->company_logo) }}" alt="Job Image"
                                        class="img-fluid border" style="max-height: 130px;">
                                @else
                                    <img src="{{ asset('client/df.jpg') }}" alt="Free Website Template by Free-Template.co"
                                        class="img-fluid">
                                @endif
                            </div>

                            <div class="col-md-7">
                                <div class="card-body py-3">
                                    <h5 class="card-title fw-semibold text-dark mb-1">
                                        {{ $data->job->title }}
                                    </h5>
                                    <p class="text-muted mb-1">
                                        <strong>Công ty:</strong> {{ $data->job->employer->company_name }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-geo-alt-fill text-secondary me-1"></i>
                                        {{ $data->job->location }}
                                    </p>
                                    <a href="{{ route('client.job_single', ['jobDetail' => $data->job->id]) }}"
                                        class="stretched-link"></a>
                                </div>
                            </div>

                            <div class="col-md-3 text-end pe-4">
                                <div class="d-flex flex-column justify-content-center align-items-end h-100">
                                    <span
                                        class="badge  mb-2 {{ $data->job->job_type ? 'bg-success' : 'bg-danger' }} text-black">{{ $data->job->job_type ? 'Full Time' : 'Part Time' }}</span>
                                    <form action="{{ route('client.remove_favorite', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa công việc này không?');">
                                        @csrf
                                        <button type="submit" href="{{ route('client.remove_favorite', $data->id) }}"
                                            class="btn btn-block btn-light btn-md"><span
                                                class="icon-heart-o mr-2 text-danger"></span>Remove Job</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                @empty
                    <p class="text-muted">Bạn chưa có công việc yêu thích nào.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
