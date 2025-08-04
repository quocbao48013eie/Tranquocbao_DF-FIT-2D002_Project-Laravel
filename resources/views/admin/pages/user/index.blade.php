@extends('admin.layout.master')

@section('content')
    <div class="container-fluid mt-4">
        @if (session('msg'))
            <div class="alert {{ session('type') == 'success' ? 'alert-success' : 'alert-danger' }}">
                {{ session('msg') }}
            </div>
        @endif



        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Danh sách người dùng</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Super Role</th>
                            <th>Ngày tạo</th>
                            <th>Đã xóa</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                            <tr class="{{ $data->deleted_at ? 'table-danger' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ ucfirst($data->role) }}</td>
                                <td>
                                    <span class="badge {{ $data->super_role ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $data->super_role ? 'Quản trị viên' : 'Người dùng' }}
                                    </span>
                                </td>
                                <td>
                                    {{ $data->created_at ? $data->created_at->format('d/m/Y H:i') : '-' }}
                                </td>
                                <td>
                                    @if ($data->deleted_at)
                                        <span class="text-danger">{{ $data->deleted_at->format('d/m/Y H:i') }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($data->deleted_at)
                                        <form action="{{ route('admin.user.restore', ['id' => $data->id]) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.user.edit', ['user' => $data]) }}"
                                            class="btn btn-sm btn-info">Chỉnh sửa</a>
                                        @if (!$data->super_role)
                                            <form action="{{ route('admin.user.destroy', ['user' => $data->id]) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')"
                                                    class="btn btn-sm btn-danger">Xóa</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Không có người dùng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                {{ $datas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
