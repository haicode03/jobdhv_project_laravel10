@extends('layouts.admin')

@section('title', 'Edit Job')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Sửa thông tin công việc</h2>
    </div>

    <div class="container shadow p-4">
        <div class="row pb-2">
            <h2>Sửa thông tin công việc</h2>
        </div>
    </div>
    <br>
    <form action="{{ route('admin/jobs/update', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="control-label">Tên công việc</label>
            <input type="text" name="title" id="title" value="{{ $job->title }}" class="form-control" />
            <span class="text-danger"></span>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Mức lương</label>
            <input type="text" name="wage" id="wage" value="{{ $job->wage }}" class="form-control"></input>
            <span class="text-danger"></span>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Mô tả thêm</label>
            <textarea type="text" name="description" id="description" class="form-control">{{ $job->description }}</textarea>
            <span class="text-danger"></span>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Danh mục</label>
            <select name="category_id" class="form-control">
                @foreach($category as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Công ty</label>
            <select name="company_id" class="form-control">
                @foreach($company as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $job->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Địa điểm</label>
            <select name="location_id" class="form-control">
                @foreach($location as $location)
                    <option value="{{ $location->id }}" {{ $location->id == $job->location_id ? 'selected' : '' }}>{{ $location->city }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Loại công việc</label>
            <select name="job_type_id" class="form-control">
                @foreach($job_type as $jobType)
                    <option value="{{ $jobType->id }}" {{ $jobType->id == $job->job_type_id ? 'selected' : '' }}>{{ $jobType->type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Trạng thái duyệt</label>
            <select name="is_approved" class="form-control">
                <option value="1" {{ $job->is_approved ? 'selected' : '' }}>Đã duyệt</option>
                <option value="0" {{ !$job->is_approved ? 'selected' : '' }}>Chưa duyệt</option>
            </select>
        </div>
        <div class="form-group col-md-6 mb-3">
            <label class="control-label">Ảnh công việc</label>
            <input type="file" name="image" class="form-control" />
            <span class="text-danger"></span>
        </div>
        @if($job->image_path)
            <div class="form-group col-md-6 mb-3">
                <label class="control-label">Ảnh hiện tại</label>
                <img src="{{ asset('images/'.$job->image_path) }}" alt="{{ $job->title }}" class="img-fluid">
            </div>
        @endif
        <br>
        <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Cập nhật</button>
        <a href="{{ route('admin/jobs/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
    </form>
</main>
@endsection
