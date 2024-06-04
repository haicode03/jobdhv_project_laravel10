<x-admin-layout>
    <div class="container">
        <h1>Bài viết</h1>
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary mb-3">Thêm bài viết</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ảnh</th>
                    <th>Tóm tắt</th>
                    <th>Người đăng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        {{-- <td><img src="{{ asset('images/'.$post->img) }}" alt="Image" width="200"></td> --}}
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" width="50">
                            @endif
                        </td>
                        <td>{{ $post->abstract }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>