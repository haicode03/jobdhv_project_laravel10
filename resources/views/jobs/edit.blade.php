@extends('layouts.app')

@section('content')
<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Sửa thông tin công việc</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Sửa thông tin công việc</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Sửa thông tin</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <form action="/jobs/{{ $job-> id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input
                    class="form-control"
                    type="text"
                    name="title"
                    value="{{ $job->title }}"
                    placeholder="Nhập tên công việc">
                    <input
                    class="form-control"
                    type="text"
                    name="wage"
                    value="{{ $job->wage }}"
                    placeholder="Nhập mức lương">
                    <input
                    class="form-control"
                    type="text"
                    name="description"
                    value="{{ $job->description }}"
                    placeholder="Nhập mô tả công việc">
                    
                    <button
                    class="btn btn-primary"
                    type="submit">
                    Submit
                    </button>
                </form>
            </ul>
            
        </div>
    </div>
</div>
<!-- Jobs End -->


@endsection