@extends('client.layout.master')
@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">

        <div class="container py-5">
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4 text-center p-3">
                        @if ($data->company_logo)
                            <img src="{{ asset($data->company_logo) }}"
                                alt="Free Website Template by Free-Template.co" class="img-fluid">
                        @else
                            <img src="{{ asset('client/df.jpg') }}" alt="Free Website Template by Free-Template.co"
                                class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Công ty: {{ $data->company_name }}</h4>

                            <p><strong>Website:</strong> <span
                                    class="text-muted">{{ $data->website ? $data->website : 'Không có' }}</span></p>

                            <p><strong>Mô tả:</strong></p>
                            <div class="border p-2 mb-3 bg-light">
                                <p>{!! $data->description !!}</p>
                            </div>
                            <p><strong>Địa chỉ:</strong> {{ $data->address }}</p>

                            <a href="{{ route('client.index') }}" class="btn btn-primary mt-3">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
