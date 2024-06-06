@extends('layouts.admin')

@section('title', 'Create Category')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận thêm ngành nghề</h2>
    </div>
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Thêm mới ngành nghề</h2>
        </div>
        <form action="{{ route('admin/category/store') }}" method="post" enctype="multipart/form-data">
            <div asp-validation-summary="All"></div>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label asp-for="name">Tên ngành nghề</label>
                    <input type="text"  name="name" id="name" class="form-control mb-3 @error('name') is-invalid @enderror" placeholder="Nhập tên ngành nghề">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label asp-for="description" class="control-label">Mô tả thêm</label>
                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    <span asp-validation-for="description" class="text-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label asp-for="created_at" class="control-label">Ngày tạo</label>
                    <input type="date" name="created_at" id="created_at" class="form-control" />
                    <span class="text-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label asp-for="updated_at" class="control-label">Ngày cập nhật</label>
                    <input type="date" name="updated_at" id="updated_at" class="form-control" />
                    <span asp-validation-for="updated_at" class="text-danger"></span>
                </div>
            </div>
            <br>
            <button typeof="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
            <a href="{{ route('admin/category/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>
@endsection