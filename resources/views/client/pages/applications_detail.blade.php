@extends('client.layout.master')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Chi tiết ứng tuyển</h5>
                        </div>
                        <div class="card-body">

                            <h5 class="text-secondary mb-3">📌 Thông tin cá nhân</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Họ tên</th>
                                    <td>{{ $application->candidate->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $application->candidate->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>{{ $application->candidate->phone ?? 'Không có' }}</td>
                                </tr>
                            </table>

                            <h5 class="text-secondary mt-4 mb-3">📄 CV Ứng tuyển</h5>
                            @if ($application->cv_file)
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $application->cv_file) }}" target="_blank"
                                        class="btn btn-info btn-sm">
                                        👁️ Xem CV
                                    </a>
                                    <a href="{{ asset('storage/' . $application->cv_file) }}" download
                                        class="btn btn-success btn-sm">
                                        ⬇️ Tải CV
                                    </a>
                                </div>
                            @else
                                <p class="text-danger">Không có CV được tải lên.</p>
                            @endif

                            <h5 class="text-secondary mt-4 mb-3">✉️ Thư xin việc</h5>
                            <div class="border p-3 rounded bg-light">
                                {{ $application->cover_letter ?? 'Không có thư xin việc.' }}
                            </div>

                            <div class="mt-4 text-right">
                                <a href="{{ route('client.applications_detail.refuse', $application->id) }}" class="btn btn-secondary">❌ Từ Chối</a>
                                <a href="{{ route('client.applications_detail.accept', $application->id) }}" class="btn btn-secondary">✅ Chấp Nhận</a>
                                <a href="{{ route('client.applications') }}" class="btn btn-secondary">⬅️ Quay lại danh</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
