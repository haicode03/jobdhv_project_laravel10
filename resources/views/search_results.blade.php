@extends('layouts.app')

@section('contents')

<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tìm kiếm</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="text-center mb-5">Kết quả tìm kiếm</h1>
    @if($jobs->isEmpty())
        <p class="text-center">Không tìm thấy công việc nào phù hợp.</p>
    @else
        @foreach($jobs as $job)
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/com-logo-1.jpg') }}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3">{{ $job->title }}</h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location->name }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->jobType->name }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }} - ${{ $job->salary_max }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-light btn-square me-3" href="#"><i class="far fa-heart text-primary"></i></a>
                            <a class="btn btn-primary" href="#">Xem ngay</a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Ngày đăng: {{ $job->created_at->format('d M, Y') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
