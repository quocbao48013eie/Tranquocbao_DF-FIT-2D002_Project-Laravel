<div class="container mt-5">
    <div class="card shadow p-5">
        <h3 class="mb-4 text-success">Thư xác nhận CV hợp lệ</h3>

        <p>Chào <strong>{{ $candidate->user->name }}</strong>,</p>

        <p>
            Cảm ơn bạn đã quan tâm và ứng tuyển vào vị trí tại <strong>{{ $candidate->application->job->title }}</strong>.
            Chúng tôi xin thông báo rằng hồ sơ của bạn đã được xét duyệt và đạt yêu cầu sơ bộ.
        </p>

        <p>
            Bộ phận nhân sự của chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để trao đổi thêm về vòng phỏng vấn
            tiếp theo.
        </p>

        <p>Trân trọng,<br>
            <strong>{{ Auth::user()->name }}</strong><br>
            {{ config('app.name') }}
        </p>
    </div>
</div>
