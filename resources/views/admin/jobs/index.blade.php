@extends('layouts.admin')

@section('title', 'Jobs')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Danh sách các công việc</h2>
    </div>
    <p>
        <a class="btn btn-success" href="{{ route('admin/jobs/create') }}">
            <i class="bi bi-file-earmark-text me-1">Thêm công việc</i>
        </a>
    </p>
    @if(Session::has('success'))
    <div style="color: #155724; background-color: #cdf0d5; border-color: #c3e6cb;padding: 10px; margin-bottom: 20px; text-align:center;" class="p-2 mb-2" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <section class="section-title dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body mt-4">
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">#</th>
                                    <th class="col-3 text-center">Tên công việc</th>
                                    <th class="col-2 text-center">Mức lương</th>
                                    <th class="col-2 text-center">Trạng thái</th>
                                    <th class="col-2 text-center">Ngày tạo</th>
                                    <th class="col-2 text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($job->count() > 0)
                                    @php
                                        $i = 1;
                                    @endphp
                                @foreach($job as $rs)
                                    <tr>
                                        <td class="text-center" scope="row">{{ $i++ }}</td>
                                        <td>
                                            <a href="{{ route('admin/jobs/show', $rs->id) }}" class="text-primary">{{ $rs->title }}</a>
                                        </td>
                                        <td class="text-center">{{ $rs->wage }}</td>
                                        <td class="text-center">
                                            @if($rs->is_approved)
                                                <span class="badge bg-success">Đã duyệt</span>
                                            @else
                                                <span class="badge bg-warning">Chưa duyệt</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $rs->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin/jobs/edit', $rs->id)}}" class="btn btn-primary btn-sm me-2" title="Sửa thông tin"><i class="bi bi-pencil"></i></a>
                                            
                                            <form action="{{ route('admin/jobs/destroy', $rs->id)}}" method="POST" onsubmit="return confirm('Bạn muốn xóa công việc này ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="5">Không có công việc</td>
                                    </tr>
                                    @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection