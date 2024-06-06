@extends('layouts.admin')

@section('title', 'Edit Company')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận sửa thông tin công ty</h2>
    </div>

    <div class="container shadow p-4">
        <div class="row pb-2">
            <h2>sửa thông tin</h2>
        </div>
    </div>
    <br>
        <form action="{{ route('admin/company/update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label class="control-label">Tên công ty</label>
                <input type="text" name="name" id="name" value="{{ $company->name }}" class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label class="control-label">Email công ty</label>
                <input type="email" name="email" id="email" value="{{ $company->email }}" class="form-control"></input>
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label class="control-label">Website công ty</label>
                <input type="text" name="website" id="website" value="{{ $company->website }}" class="form-control"></input>
                <span class="text-danger"></span>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label asp-for="updated_at" class="control-label">Ngày cập nhật</label>
                <input id="updated_at" name="updated_at" value="{{ $company->updated_at->format('d-m-Y') }}" type="text" class="form-control" />
                <span class="text-danger"></span>
            </div>
           <br>
        <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Cập nhật</button>
        <a href="{{ route('admin/company/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
    </form>
</main>
@endsection