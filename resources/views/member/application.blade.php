@extends('layouts.app')
 
@section('title', 'Hồ sơ ứng tuyển')
 
@section('contents')

<!-- Header End -->
<div class="container-xxl py-1 bg-dark page-header mb-5">
    <div class="container my-3 pt-3 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ Auth::user()->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<div class="container-xxl wow fadeInUp" data-wow-delay="0.1s">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý công việc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hồ sơ ứng tuyển</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hồ sơ công ty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <label for="action">Hoạt động:</label>
                <select id="action" class="form-select d-inline-block w-auto">
                    <option>-Tất cả-</option>
                    <option>Đã phê duyệt</option>
                    <option>Từ chối</option>
                </select>
                <button class="btn btn-success">Tìm</button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Ứng viên</th>
                    <th>Công việc ứng tuyển</th>
                    <th>Tin nhắn</th>
                    <th>Tập tin đính kèm</th>
                    <th>Ngày ứng tuyển</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($application as $application)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $application->user->name }}</td>
                        <td>{{ $application->job->title }}</td>
                        <td>{{ $application->cover_letter }}</td>
                        <td><a href="{{ route('member/showResume', ['user_id' => $application->user_id]) }}">Xem</a></td>
                        <td>{{ $application->created_at->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-primary">Duyệt</button>
                            <button class="btn btn-danger">Từ chối</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Không có đơn ứng tuyển nào</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
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