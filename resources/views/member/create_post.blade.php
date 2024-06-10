@extends('layouts.app')
 
@section('title', 'Viết bài đăng')
 
@section('contents')

<!-- Header End -->
<div class="container-xxl py-1 bg-dark page-header mb-5">
    <div class="container my-3 pt-3 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ Auth::user()->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Nhà tuyển dụng</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->
    <nav style="background-color: #a0a8b1" class="navbar navbar-expand-lg navbar-light shadow p-0">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-4 p-lg-0">
                @if (Auth::user()->role_id == 2)
                <a style="padding-left: 30px"class="nav-item nav-link" href="{{ url('/member/index_post') }}">Quản lý công việc</a>
                <a class="nav-item nav-link" href="{{ url('/member/application') }}">Quản lý hồ sơ ứng tuyển</a>
                <a class="nav-item nav-link" href="{{ url('/member/profile_company') }}">Hồ sơ công ty</a>
                <a class="nav-item nav-link" href="{{ url('/logout') }}">Đăng xuất</a>
                @elseif (Auth::user()->role_id == 3)
                <a style="padding-left: 30px"class="nav-item nav-link" href="#">Quản lý sơ yếu lý lịch</a>
                <a class="nav-item nav-link" href="#">Thông báo công việc</a>
                <a class="nav-item nav-link" href="#">Quản lý theo dõi</a>
                <a class="nav-item nav-link" href="#">Việc làm đề xuất</a>
                <a class="nav-item nav-link" href="#">Đăng xuất</a>
                @endif 
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="d-flex justify-content-between mb-3">
            <div style="display: flex;align-items: center;justify-content: space-between;">
                <h3>Viết bài đăng</h3>
            </div>
            
            <div>
                <label for="action">Thuộc tính:</label>
                <select id="action" class="form-select d-inline-block w-auto">
                    <option>-Nổi bật-</option>
                    <option>Full-time</option>
                    <option>Part-time</option>
                </select>
                <button class="btn btn-success">Tìm</button>
            </div>
        </div>
        <form action="{{ route('member/store_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label class="control-label">Tên công việc</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Mức lương</label>
                <input type="text" name="wage" class="form-control" value="{{ old('wage') }}" />
                @error('wage')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Danh mục</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Công ty</label>
                <select name="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Vị trí</label>
                <select name="location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->city }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Loại công việc</label>
                <select name="job_type_id" class="form-control">
                    @foreach($job_types as $jobType)
                        <option value="{{ $jobType->id }}">{{ $jobType->type_name }}</option>
                    @endforeach
                </select>
                @error('job_type_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" />
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Tạo công việc</button>
            <a href="{{ route('member/index_post') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
<!-- Member End -->
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Custom Navbar Styles */
.navbar-custom {
    background-color: #343a40;
    padding: 0.75rem 1rem;
}
.navbar-custom .nav-link {
    color: #ffffff;
    margin-right: 1rem;
    font-weight: 500;
}
.navbar-custom .nav-link:hover {
    color: #adb5bd;
}

/* Main Content Styles */
.content {
    margin-top: 2rem;
}
.no-jobs {
    text-align: center;
    margin: 2rem 0;
}
.post-job-btn {
    background-color: #166ccf;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    margin-top: 1rem;
}
.post-job-btn:hover {
    background-color: #2c85d8;
}
.table-header {
    background-color: #f8f9fa;
}
.table-bordered th, .table-bordered td {
    vertical-align: middle;
    text-align: center;
}
.d-flex label {
    margin-right: 0.5rem;
}
.form-select {
    display: inline-block;
    width: auto;
}
.btn-success {
    margin-left: 0.5rem;
    background-color: #1372b1;
}
.btn-success:hover {
    background-color: #0667b6;
}

    </style>
</head>
<body>
    
</body>
</html>