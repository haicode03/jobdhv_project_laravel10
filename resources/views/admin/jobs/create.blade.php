@extends('layouts.admin')

@section('title', 'Thêm Công Việc')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm Công Việc</h2>
    </div>

    <div class="container shadow p-4">
        <form action="{{ route('admin/jobs/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label class="control-label">Tên công việc</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Mức lương</label>
                <input type="text" name="wage" class="form-control" value="{{ old('wage') }}" />
                @error('wage')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Danh mục</label>
                <select name="category_id" class="form-control">
                    @foreach($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Công ty</label>
                <select name="company_id" class="form-control">
                    @foreach($company as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Vị trí</label>
                <select name="location_id" class="form-control">
                    @foreach($location as $location)
                        <option value="{{ $location->id }}">{{ $location->city }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Loại công việc</label>
                <select name="job_type_id" class="form-control">
                    @foreach($job_type as $jobType)
                        <option value="{{ $jobType->id }}">{{ $jobType->type_name }}</option>
                    @endforeach
                </select>
                @error('job_type_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Trạng thái duyệt</label>
                <select name="is_approved" class="form-control">
                    <option value="1">Đã duyệt</option>
                    <option value="0">Chưa duyệt</option>
                </select>
                @error('is_approved')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="control-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" />
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Tạo công việc</button>
            <a href="{{ route('admin/jobs/index') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>
@endsection
