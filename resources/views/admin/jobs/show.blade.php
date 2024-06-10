@extends('layouts.admin')

@section('title', 'Job Details')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Chi tiết công việc</h2>
    </div>
    <div class="container shadow p-4">
        <div class="row pb-2">
            <h2>{{ $job->title }}</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><strong>Mức lương:</strong> {{ $job->wage }}</p>
                <p><strong>Danh mục:</strong> {{ $job->category->name }}</p>
                <p><strong>Công ty:</strong> {{ $job->company->name }}</p>
                <p><strong>Địa điểm:</strong> {{ $job->location->city }}</p>
                <p><strong>Loại công việc:</strong> {{ $job->job_type->type_name }}</p>
                <p><strong>Trạng thái duyệt:</strong> {{ $job->is_approved ? 'Đã duyệt' : 'Chưa duyệt' }}</p>
                @if($job->image_path)
                    <p><strong>Ảnh công việc:</strong></p>
                    <img src="{{ asset('images/'.$job->image_path) }}" alt="{{ $job->title }}" class="img-fluid mb-3">
                @endif

                @if($detailJob)
                    <h3>Chi tiết công việc</h3>
                    <p><strong>Trách nhiệm công việc:</strong>{{ isset($detailJob->responsibility) ? $detailJob->responsibility : '' }}</p>
                    <p><strong>Yêu cầu kinh nghiệm, trình độ:</strong> {{ $detailJob->level }}</p>
                    <p><strong>Tóm tắt công việc:</strong> {{ $detailJob->job_summery }}</p>
                @else
                    <p>Không có chi tiết công việc.</p>
                @endif
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('admin/jobs/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
            </div>
        </div>
    </div>
</main>
@endsection
