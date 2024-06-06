@extends('layouts.admin')

@section('title', 'Category')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Danh sách các ngành nghề</h2>
    </div>
    <p>
        <a class="btn btn-success" href="{{ route('admin/category/create') }}">
            <i class="bi bi-file-earmark-text me-1">Thêm ngành nghề</i>
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
                                    <th class="col-3 text-center">Tên ngành nghề</th>
                                    <th class="col-2 text-center">Mô tả ngành nghề</th>
                                    <th class="col-1 text-center">Ngày tạo</th>
                                    <th class="col-1 text-center">Ngày cập nhật</th>
                                    <th class="col-2 text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($category->count() > 0)
                                    @php
                                        $i = 1;
                                    @endphp
                                @foreach($category as $rs)
                                    <tr>
                                        <td class="text-center" scope="row">{{ $i++ }}</td>
                                        <td>
                                            <a href="" class="text-primary">{{ $rs->name }}</a>
                                        </td>
                                        <td class="text-center">{{ Illuminate\Support\Str::limit($rs->description, 50) }}</td>
                                        <td class="text-center">{{ $rs->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $rs->updated_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin/category/edit', $rs->id)}}" class="btn btn-primary btn-sm me-2" title="Sửa thông tin"><i class="bi bi-pencil"></i></a>
                                            
                                            <form action="{{ route('admin/category/destroy', $rs->id)}}" method="POST" onsubmit="return confirm('Bạn muốn xóa ngành nghề này?')">
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
                                        <td class="text-center" colspan="5">Không có ngành nghề</td>
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