@extends('client.layout.master')

@section('content')
<section class="section-hero overlay inner-page bg-image"
    style="background-image: url('{{ asset('client/images/hero_1.jpg') }}');" id="home-section">

    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="text-center text-primary mb-4">
                    📄 Danh sách đơn ứng tuyển
                </h3>

                @if ($applications->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        Chưa có đơn ứng tuyển nào.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="thead-light bg-primary text-white">
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Ứng viên</th>
                                    <th scope="col">Ngày nộp</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $key => $application)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $application->job->title ?? 'N/A' }}</td>
                                        <td>{{ $application->candidate->user->name ?? 'Ẩn danh' }}</td>
                                        <td class="text-center">{{ $application->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('client.applications_detail', $application->id) }}"
                                               class="btn btn-sm btn-info">
                                                👁️ Xem
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
