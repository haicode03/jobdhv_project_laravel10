@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        <button type="button" class="btn btn-success btn-sm" onclick="window.location.reload();">OK</button>
    </div>
@endif

@extends('layouts.app')

@section('title', 'Home')

@section('contents')

<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Tìm công việc hoàn hảo mà bạn xứng đáng</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Chúng tôi ở đây và đồng hành cùng bạn.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tìm một công việc</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Tìm một ứng viên</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Tìm công việc khởi nghiệp tốt nhất phù hợp với bạn</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Hơn 20.000 cơ hội nghề nghiệp cho bạn</p>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tìm một công việc</a>
                            <a href="#" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Tìm một ứng viên</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


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




<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Các ngành nghề nổi bật</h1>
        <div class="row g-4">

            @foreach ($categories as $category )
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x {{ $category->description }} text-primary mb-4"></i>
                    <h6 class="mb-3">{{ $category->name }}</h6>
                    <p class="mb-0">50 vị trí</p>
                </a>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="img/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="img/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Chúng tôi giúp bạn có được công việc tốt nhất và tìm kiếm nhân tài</h1>
                <p class="mb-4">Mang đến những góc nhìn, câu chuyện và lời khuyên từ những người trong nghề</p>
                <p><i class="fa fa-check text-primary me-3"></i>Theo anh chị thì điều mà các nhà tuyển dụng tìm kiếm trong thư xin việc là gì?</p>
                <p><i class="fa fa-check text-primary me-3"></i>Một bức thư giới thiệu xin việc nên dài bao nhiêu và nên được cấu trúc như thế nào?</p>
                <p><i class="fa fa-check text-primary me-3"></i>Anh chị có mẹo gì để viết thư xin việc thu hút nhà tuyển dụng không?</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="#">Đọc thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Bắt đầu Jobs -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Danh sách công việc</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">Nổi bật</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <!-- Hiển thị công việc nổi bật -->
                    @foreach($jobs as $index => $job)
                        @if($job->job_type_id == 1)
                            @php
                                $expirationDate = $job->created_at->addDays(30);
                                $daysRemaining = now()->diffInDays($expirationDate);
                            @endphp
                            <div class="job-item p-4 mb-4 {{ $index >= 4 ? 'd-none' : '' }}">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/' . $job->image_path) }}" alt="" style="width: 80px; height: 80px;">
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
                        @endif
                    @endforeach
                    <button id="show-more" class="btn btn-primary py-3 px-5">Hiển thị thêm</button>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <!-- Hiển thị công việc full time -->
                    @foreach($jobs as $job)
                        @if($job->job_type_id == 2)
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
                        @endif
                    @endforeach
                    <a class="btn btn-primary py-3 px-5" href="">Hiển thị thêm</a>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <!-- Hiển thị công việc part time -->
                    @foreach($jobs as $job)
                        @if($job->job_type_id == 3)
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
                        @endif
                    @endforeach
                    <a class="btn btn-primary py-3 px-5" href="">Hiển thị thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc Jobs -->



<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="text-center mb-5">Đánh giá của khách hàng!!!</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Chất lượng phục vụ rất tốt. Xin cảm ơn.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Hai Hoang</h5>
                        <small>Dev - FrontEnd</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Tôi rất hài lòng về chất lượng!</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Nga Ho</h5>
                        <small>Tester</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Hỗ trợ nhiệt tình.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Cảm ơn bạn.</h5>
                        <small>FullStack - Dev</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Bạn có thể giúp tôi lần nữa không?</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Son Hoang</h5>
                        <small>Deginer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showMoreButton = document.getElementById('show-more');
        let currentIndex = 4;

        showMoreButton.addEventListener('click', function () {
            const hiddenJobs = document.querySelectorAll('.job-item.d-none');
            for (let i = 0; i < 4; i++) {
                if (hiddenJobs[i]) {
                    hiddenJobs[i].classList.remove('d-none');
                } else {
                    showMoreButton.style.display = 'none';
                    break;
                }
            }
            currentIndex += 4;
        });
    });
</script

@endsection