<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn loại tài khoản</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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

        .card-select {
            background-color: #1e293b;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .card-select:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }

        .card-select i {
            font-size: 3rem;
            color: #3b82f6;
            margin-bottom: 1rem;
        }

        .card-select h5 {
            margin-top: 1rem;
            font-weight: 600;
        }

        .container-box {
            max-width: 800px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container container-box">
        <h2 class="text-center mb-5">Bạn muốn đăng ký tài khoản với vai trò nào?</h2>
        <div class="row g-4">
            <!-- Candidate -->
            <div class="col-md-6">
                <a href="{{ route('register') }}" class="text-decoration-none text-light">
                    <div class="card-select">
                        <i class="fa-solid fa-user"></i>
                        <h5>Ứng viên (Candidate)</h5>
                        <p>Tạo hồ sơ và tìm kiếm việc làm phù hợp với bạn.</p>
                    </div>
                </a>
            </div>

            <!-- Employer -->
            <div class="col-md-6">
                <a href="{{ route('client.company_register') }}" class="text-decoration-none text-light">
                    <div class="card-select">
                        <i class="fa-solid fa-building-user"></i>
                        <h5>Nhà tuyển dụng (Employer)</h5>
                        <p>Đăng tin tuyển dụng và tìm kiếm ứng viên tiềm năng.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
