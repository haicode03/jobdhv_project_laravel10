@extends('layouts.app')
 
@section('title', 'Hồ sơ cá nhân')
 
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
    <nav style="background-color: #a0a8b1" class="navbar navbar-expand-lg navbar-light shadow p-0">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-4 p-lg-0">
                @if (Auth::user()->role_id == 2)
                <a style="padding-left: 30px"class="nav-item nav-link" href="{{ url('/member/post_job') }}">Quản lý công việc</a>
                <a class="nav-item nav-link" href="{{ url('/member/application') }}">Quản lý hồ sơ ứng tuyển</a>
                <a class="nav-item nav-link" href="#">Hồ sơ công ty</a>
                <a class="nav-item nav-link" href="{{ url('/logout') }}">Đăng xuất</a>
                @elseif (Auth::user()->role_id == 3)
                <a style="padding-left: 30px"class="nav-item nav-link" href="{{ url('/member/profile_candidate') }}">Quản lý sơ yếu lý lịch</a>
                <a class="nav-item nav-link" href="{{ url('/member/notifications') }}">Thông báo công việc</a>
                <a class="nav-item nav-link" href="#">Quản lý theo dõi</a>
                <a class="nav-item nav-link" href="#">Việc làm đề xuất</a>
                <a class="nav-item nav-link" href="{{ url('/logout') }}">Đăng xuất</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="row">
            <div style="padding-left: 100px" class="noo-main col-md-12 noo-page">
                <h3 align-item-center>Hồ sơ</h3>
                <br>
                <form method="post">
                    @csrf
                    <div class="candidate-profile-form row">
                        <div class="col-sm-10 center">
                            <div class="form-group row required-field">
                                <label for="full_name" class="col-sm-4 col-form-label">Họ tên</label>
                                <div class="col-sm-8">
                                    <input id="full_name" class="form-control jform-validate" required aria-required="true" type="text" name="name" value="{{ $user->name }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group row required-field">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input id="email" class="form-control jform-validate" required aria-required="true" type="email" name="email" value="{{ $user->email }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group row required-field">
                                <label for="birthday" class="col-sm-4 col-form-label">Ngày sinh</label>
                                <div class="col-sm-8">
                                    <input placeholder="Birthday" type="text" value="{{ isset($user->user_profile) ? $user->user_profile->date_of_birth : '' }}" class="form-control jform-datepicker jform-validate" required readonly aria-required="true" name="birthday">
                                </div>
                            </div>
                            <div class="form-group row required-field">
                                <label for="address" class="col-sm-4 col-form-label">Địa chỉ</label>
                                <div class="col-sm-8">
                                    <input id="address" class="form-control jform-validate" required aria-required="true" type="text" name="address" value="{{ isset($user->user_profile) ? $user->user_profile->address : '' }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group row required-field">
                                <label for="phone" class="col-sm-4 col-form-label">Số điện thoại</label>
                                <div class="col-sm-8">
                                    <input id="phone" class="form-control jform-validate" required aria-required="true" type="text" name="phone" value="{{ isset($user->user_profile) ? $user->user_profile->phone_number : '' }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group row required-field">
                                <label for="resume_file" class="col-sm-4 col-form-label">CV của bạn</label>
                                <div class="col-12 col-sm-6">
                                    <input type="file" name="cv" class="form-control bg-white" placeholder="CV của bạn">
                                    @if ($user->resume->isNotEmpty())
                                        <ul class="mt-2">
                                            @foreach ($user->resume as $resume)
                                                <li><a href="{{ asset('cv/' . $resume->file_path) }}" target="_blank">Xem CV hiện tại</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Cập nhật hồ sơ</button>
                    </div>
                </form>
            </div>
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
    .form-group {
        margin-bottom: 1rem;
    }
    .form-control-flat .upload-to-cv {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .upload-preview-wrap input {
        display: none;
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