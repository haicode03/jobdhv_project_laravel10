@extends('layouts.admin')

@section('title', 'Quản lý người dùng')

@section('contents')
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Danh sách người dùng</h2>
    </div>
    <p>
        <a class="btn btn-success" href="{{ route('admin/users/create') }}">
            <i class="bi bi-person-plus me-1">Thêm người dùng</i>
        </a>
    </p>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card overflow-auto">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($users as $user)
                                @if ($user->role_id !== 1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <a href="{{ route('admin/users/edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin/users/destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
