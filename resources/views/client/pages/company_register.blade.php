<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Employer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="{{ asset('client/css/quill.snow.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #0f172a;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background-color: #1e293b;
            padding: 2rem;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
        }

        .form-control,
        .form-select {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #e2e8f0;
        }

        .form-control:focus {
            background-color: #0f172a;
            color: #e2e8f0;
            border-color: #3b82f6;
            box-shadow: none;
        }

        ::placeholder {
            color: #e2e8f0 !important;
            opacity: 1;
        }

        .btn-primary {
            background-color: #3b82f6;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        label {
            margin-bottom: 0.3rem;
        }

        a {
            color: #60a5fa;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="text-center mb-3">
            <img src="https://laravel.com/img/logomark.min.svg" width="40" alt="Laravel">
        </div>

        <h4 class="mb-4 text-center">Đăng ký tài khoản nhà tuyển dụng</h4>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Tên người dùng <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ old('name') }}" placeholder="Nhập tên của bạn" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" value="{{ old('email') }}" placeholder="Nhập email..." required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" name="role" value="employer" id="role">

            <div class="mb-3">
                <label for="password">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Nhập mật khẩu..." required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu..." required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="company_name">Tên công ty <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                    name="company_name" id="company_name" value="{{ old('company_name') }}"
                    placeholder="VD: Công ty TNHH ABC" required>
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo">Upload Logo <span class="text-danger">*</span></label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" required>
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="website">Website</label>
                <input type="url" class="form-control @error('website') is-invalid @enderror" name="website"
                    id="website" value="{{ old('website') }}" placeholder="https://example.com">
                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Mô tả công ty</label>
                <div id="editor-1" style="height: 200px;">{!! old('description') !!}</div>
                <input type="hidden" name="description" value="{{ old('description') }}" id="description">
                @error('description')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    id="address" value="{{ old('address') }}" placeholder="Số nhà, đường, quận, TP...">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('login') }}">Đã có tài khoản?</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('client/js/quill.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quill = new Quill('#editor-1', {
                theme: 'snow'
            });

            const form = document.querySelector('form');
            const hiddenInput = document.querySelector('#description');

            form.addEventListener('submit', function(e) {

                hiddenInput.value = quill.root.innerHTML;
            });
        });
    </script>
</body>

</html>
