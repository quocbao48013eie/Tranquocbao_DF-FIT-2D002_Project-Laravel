@extends('admin.layout.master')

@section('content')
@php use Illuminate\Support\Str; @endphp
    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách công việc</h5>
                @if (session('msg'))
                    <div class="ms-auto">
                        @if (session('msg') === 'success')
                            <div class="alert alert-success mb-0 py-1 px-3">Xoá thành công!</div>
                        @else
                            <div class="alert alert-danger mb-0 py-1 px-3">Xoá thất bại!</div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Công ty</th>
                                <th>Mô tả</th>
                                <th>Lương</th>
                                <th>Địa điểm</th>
                                <th>Hình thức</th>
                                <th>Hạn nộp</th>
                                <th>Ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->employer?->company_name ?? 'N/A' }}</td>
                                    <td>{!! Str::limit(strip_tags($data->description), 50) !!}</td>
                                    <td class="text-end">{{ number_format($data->salary) }} đ</td>
                                    <td>{{ $data->location }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $data->job_type ? 'success' : 'warning' }}">
                                            {{ $data->job_type ? 'Full Time' : 'Part Time' }}
                                        </span>
                                    </td>
                                    <td>{{ $data->deadline ? \Carbon\Carbon::parse($data->deadline)->format('d/m/Y') : '-' }}
                                    </td>
                                    <td>{{ $data->created_at ? \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') : '-' }}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.jobposts.destroy', ['jobpost' => $data->id]) }}"
                                            method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Xoá">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($datas->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Không có công việc nào</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-center">
                {{ $datas->links() }}
            </div>
        </div>
    </div>
@endsection
