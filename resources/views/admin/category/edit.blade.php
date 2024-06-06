@extends('layouts.admin')

@section('title', 'Edit Category')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận sửa thông tin ngành nghề</h2>
    </div>

    <div class="container shadow p-4">
        <div class="row pb-2">
            <h2>sửa thông tin</h2>
        </div>
    </div>
    <br>
        <form action="{{ route('admin/category/update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="control-label">Tên ngành nghề</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Mô tả thêm</label>
                <textarea type="text" name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6">
                <label asp-for="created_at" class="control-label">Ngày tạo</label>
                <input id="created_at" name="created_at" value="{{ $category->created_at->format('d-m-Y') }}" type="text" class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6">
                <label asp-for="updated_at" class="control-label">Ngày cập nhật</label>
                <input id="updated_at" name="updated_at" value="{{ $category->updated_at->format('d-m-Y') }}" type="text" class="form-control" />
                <span class="text-danger"></span>
            </div>
           <br>
        <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Cập nhật</button>
        <a href="{{ route('admin/category/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
    </form>
</main>
@endsection