@extends('layouts.admin')

@section('title', 'Application')

@section('contents')

<main id="main" class="main">
    <div class="pagetitle">
        <h2>Danh sách hồ sơ ứng tuyển</h2>
    </div>
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
                                    <th class="col-3 text-center">Ứng viên</th>
                                    <th class="col-3 text-center">Công việc ứng tuyển</th>
                                    <th class="col-1 text-center">Thư ứng tuyển</th>
                                    <th class="col-2 text-center">Tệp đính kèm</th>
                                    <th class="col-1 text-center">Ngày gửi CV</th>
                                    <th class="col-1 text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($applications->count() > 0)
                                    @foreach ($applications as $application)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $application->user->name }}</td>
                                        <td class="text-center">{{ $application->job->title }}</td>
                                        <td class="text-center">{{ $application->cover_letter }}</td>
                                        <td class="text-center">
                                            @if ($application->user->resume->isNotEmpty())
                                                @foreach ($application->user->resume as $resume)
                                                    <a href="{{ asset('cv/' . $resume->file_path) }}">Xem</a>
                                                @endforeach
                                            @else
                                                Không có hồ sơ
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $application->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <form action="{{ route('admin/applications/destroy', $application->id) }}" method="POST" onsubmit="return confirm('Bạn muốn xóa đơn ứng tuyển này?')">
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
                                        <td colspan="7" class="text-center">Không có đơn ứng tuyển nào</td>
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
