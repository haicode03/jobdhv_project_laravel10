@extends('layouts.admin')

@section('title', 'Thêm mới tài khoản')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm mới tài khoản</h2>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin/users/store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Vai trò</label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option value="2">Nhà tuyển dụng</option>
                                    <option value="3">Ứng viên</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
