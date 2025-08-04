<div class="container mt-5">
    <div class="card shadow p-5">
        <h3 class="mb-4 text-danger">Thư từ chối ứng viên</h3>

        <p>Chào <strong>{{ $candidate->user->name }}</strong>,</p>

        <p>
            Cảm ơn bạn đã quan tâm và ứng tuyển vào vị trí  <strong>{{ $candidate->application->job->title }}</strong>.
            Tuy nhiên, sau khi xem xét kỹ lưỡng, chúng tôi rất tiếc phải thông báo rằng hồ sơ của bạn hiện chưa phù hợp
            với yêu cầu công việc.
        </p>

        <p>
            Chúng tôi đánh giá cao sự quan tâm của bạn và hy vọng sẽ có cơ hội hợp tác trong tương lai.
        </p>

        <p>Trân trọng,<br>
            <strong>{{ Auth::user()->name }}</strong><br>
            {{ config('app.name') }}
        </p>
    </div>
</div>
