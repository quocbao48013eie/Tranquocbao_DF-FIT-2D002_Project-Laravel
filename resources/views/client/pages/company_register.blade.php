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
    <link href="{{asset('client/css/quill.snow.css')}}" rel="stylesheet">

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

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Tài khoản người dùng -->
            <div class="mb-3">
                <label for="name">Tên người dùng <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                    placeholder="Nhập tên của bạn" required>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Nhập email..." required>
            </div>
            <div class="mb-3">
                <input type="hidden" name="role" value="employer" id="role">
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Nhập mật khẩu..." required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                    placeholder="Nhập lại mật khẩu..." required>
            </div>

            <!-- Thông tin công ty -->
            <div class="mb-3">
                <label for="company_name">Tên công ty <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="company_name" id="company_name"
                    value="{{ old('company_name') }}" placeholder="VD: Công ty TNHH ABC" required>
            </div>

            <div class="mb-3">
                <label for="website">Website</label>
                <input type="url" class="form-control" name="website" id="website" value="{{ old('website') }}"
                    placeholder="https://example.com">
            </div>

            <div class="mb-3">
                <div id="editor-1" style="height: 200px;">Write Job Description!</div>
                <label for="description">Mô tả công ty</label>
                <input type="hidden" name="description" value="{{ old('description') }}" id="description">
            </div>

            <div class="mb-4">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"
                    placeholder="Số nhà, đường, quận, TP...">
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
    <script src="{{asset('client/js/quill.min.js')}}"></script>
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
