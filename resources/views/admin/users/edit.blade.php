@extends('layouts.admin')

@section('title', 'Chỉnh sửa tài khoản')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Chỉnh sửa tài khoản</h2>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin/users/update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Vai trò</label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Nhà tuyển dụng</option>
                                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Ứng viên</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
