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

<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('search') }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col-md-4">
                        <input type="text" name="keyword" class="form-control border-0" placeholder="Nhập việc làm" />
                    </div>
                    <div class="col-md-3">
                        <select name="category" class="form-select border-0">
                            <option selected>Ngành nghề</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="location" class="form-select border-0">
                            <option selected>Nơi làm việc</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="text-center mb-5">Kết quả tìm kiếm</h1>
    @if($jobs->isEmpty())
        <p class="text-center">Không tìm thấy công việc nào phù hợp.</p>
    @else
        @foreach($jobs as $job)
        @php
        $expirationDate = $job->created_at->addDays(30);
        $daysRemaining = now()->diffInDays($expirationDate);
            @endphp
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="img/{{ asset($job->image_path) }}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3">{{ $job->title }} <small style="font-size: 10px" class="text-success">(Hết hạn sau: {{ $daysRemaining }} ngày)</small></h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location->city }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->job_type->type_name }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->wage }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                            <a class="btn btn-primary" href="{{ route('jobs/show', $job->id) }}">Xem ngay</a>
                        </div>
                        <small class="text-truncate text-success"><i class="far fa-calendar-alt text-primary me-2"></i>Đăng ngày: {{ $job->created_at->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
