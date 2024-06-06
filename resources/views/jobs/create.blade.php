@extends('layouts.app')

@section('content')
<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Danh sách công việc</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Thêm công việc</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Thêm công việc</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <form action="/jobs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="file" name="image" placeholder="Thêm ảnh">
                    <input class="form-control" type="text" name="title" placeholder="Nhập tên công việc">
                    <input class="form-control" type="text" name="wage" placeholder="Nhập mức lương">
                    <input class="form-control" type="text" name="description" placeholder="Nhập mô tả công việc">
                        <div>
                            <label>Choose a categories:</label>
                            <select name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        <p style="text-align: center;" class="text-danger">
            {{ $error }}
        </p>
        @endforeach
    </div>
@endif


@endsection