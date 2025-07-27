@extends('client.layout.master')
@section('content')
    <h2>Chi tiết đơn ứng tuyển</h2>
    <table class="table">
        <tr>
            <th>Vị trí:</th>
            <td>{{ $application->job->title ?? 'Không rõ' }}</td>
        </tr>
        <tr>
            <th>CV:</th>
            <td>
                <a href="{{ asset('storage/' . $application->cv_file) }}" target="_blank">Xem CV</a> |
                <a href="{{ asset('storage/' . $application->cv_file) }}" download>Tải về</a>
            </td>
        </tr>
        <tr>
            <th>Ngày nộp:</th>
            <td>{{ $application->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Thư xin việc:</th>
            <td>{{ $application->cover_letter }}</td>
        </tr>
    </table>
@endsection
