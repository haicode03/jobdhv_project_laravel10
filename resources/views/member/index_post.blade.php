@extends('layouts.app')
 
@section('title', 'Danh sách bài đăng')
 
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
                <a class="nav-item nav-link" href="{{ url('/member/notifications') }}">Thông báo công việc</a>
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
                <h3>Danh sách bài đăng</h3>
                <p>
                    <a class="btn btn-success" href="{{ route('member/create_post') }}">
                        <i class="bi bi-file-earmark-text">Viết bài đăng</i>
                    </a>
                </p>
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
        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Tên công việc</th>
                    <th>Mức lương</th>
                    <th>Vị trí ứng tuyển</th>
                    <th>Nơi làm việc</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobs as $job)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->wage }}</td>
                        <td>Vị trí</td>
                        <td>{{ $job->location->city }}</td>
                        <td>{{ $job->created_at->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-primary">Sửa</button>
                            <button class="btn btn-danger">Xóa</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Không có bài đăng nào/td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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