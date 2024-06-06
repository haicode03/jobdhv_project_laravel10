@extends('layouts.app')

@section('title', 'Show Job')

@section('contents')

<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Chi tiết công việc</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/jobs/index') }}">Công việc</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Chi tiết công việc</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Job Detail Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    <img class="flex-shrink-0 img-fluid border rounded" src="/img/{{ asset($jobs->image_path) }}" alt="" style="width: 80px; height: 80px;">
                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $jobs->title }}</h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location->city }}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $jobs->job_type->type_name }}</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $jobs->wage }}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Mô tả công việc</h4>
                    <p>{{ $jobs->description }}</p>
                    <h4 class="mb-3">Trách nhiệm</h4>
                    <ul class="list-unstyled">
                        @php
                            $responsibilitys = explode('.', $jobs->detail_job->responsibility);
                        @endphp
                        @foreach($responsibilitys as $responsibility)
                            <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                    <h4 class="mb-3">Trình độ</h4>
                    <ul class="list-unstyled">
                        @php
                            $levels = explode('.', $jobs->detail_job->level);
                        @endphp
                        @foreach($levels as $level)
                            <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $level }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="">
                    <h4 class="mb-4">Ứng tuyển</h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="Nhập tên của bạn">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control" placeholder="Nhập Email">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="file" class="form-control bg-white" placeholder="CV của bạn">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Thư ứng tuyển"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Gửi CV</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Tóm tắt công việc</h4>
                    @php
                        $job_summerys = explode('.', $jobs->detail_job->job_summery);
                    @endphp
                    <ul class="list-unstyled">
                        @foreach($job_summerys as $job_summery)
                            <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $job_summery }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Chí tiết công ty</h4>
                    <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->

@endsection