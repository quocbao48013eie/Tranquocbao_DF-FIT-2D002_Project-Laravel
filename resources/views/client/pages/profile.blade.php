@extends('client.layout.master')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-primary text-white rounded-top-4 text-center">
                            <h4 class="mb-0">Thông tin cá nhân</h4>
                        </div>
                        <div class="card-body">
                            @if ($user->role == 'employer')
                                <span class="badge badge-pill badge-dark"
                                    style="height: 35px; font-size: 1rem; padding: 10px 20px;">Nhà Tuyển Dụng <i
                                        class="ml-2 fa fa-building" aria-hidden="true"></i></i></span>
                            @endif

                            <div class="text-center mb-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=100"
                                    alt="Avatar" class="rounded-circle shadow-sm" width="100" height="100">
                                <h5 class="mt-3">{{ $user->name }}</h5>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-sm-4 fw-bold">Tên:</label>
                                <div class="col-sm-8">{{ $user->name }}</div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 fw-bold">Email:</label>
                                <div class="col-sm-8">{{ $user->email }}</div>
                            </div>
                            @if ($user->role == 'employer')
                                <div class="card-header bg-light text-white rounded-top-4 text-center">
                                    <h4 class="mb-0">Thông tin công ty</h4>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 fw-bold">Tên Công Ty:</label>
                                    <div class="col-sm-8">{{ $user->employer->company_name }}</div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 fw-bold">Địa chỉ:</label>
                                    <div class="col-sm-8">{{ $user->employer->address }}</div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 fw-bold">Website:</label>
                                    <div class="col-sm-8">{{ $user->employer->website }}</div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 fw-bold">Mô tả công ty:</label>
                                    <div class="col-sm-8">{!! $user->employer->description !!}</div>
                                </div>
                            @endif
                            <div class="text-end">
                                <a href="#" class="btn btn-outline-primary">Chỉnh sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
