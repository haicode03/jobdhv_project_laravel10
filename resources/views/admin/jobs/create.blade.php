@extends('layouts.admin')

@section('title', 'Create Company')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận thêm công ty</h2>
    </div>
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Thêm mới công ty</h2>
        </div>
        <form action="{{ route('admin/company/store') }}" method="post" enctype="multipart/form-data">
            <div asp-validation-summary="All"></div>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label asp-for="name">Tên công ty</label>
                    <input type="text"  name="name" id="name" class="form-control mb-3 @error('name') is-invalid @enderror" placeholder="Nhập tên công ty">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label asp-for="description" class="control-label">Email công ty</label>
                    <input type="email" name="email" id="email" class="form-control"></input>
                    <span class="text-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label asp-for="description" class="control-label">Website công ty</label>
                    <input type="website" name="website" id="website" class="form-control"></input>
                    <span class="text-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label asp-for="created_at" class="control-label">Ngày tạo</label>
                    <input type="date" name="created_at" id="created_at" class="form-control" />
                    <span class="text-danger"></span>
                </div>
            </div>
            <br>
            <button typeof="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
            <a href="{{ route('admin/company/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>
@endsection