@extends('admin.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Chỉnh sửa người dùng</h2>


    <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select name="role" id="role" class="form-select" disabled>
                <option value="candidate" {{ $user->role == 'candidate' ? 'selected' : '' }}>Candidate</option>
                <option value="employer" {{ $user->role == 'employer' ? 'selected' : '' }}>Employer</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
@endsection
