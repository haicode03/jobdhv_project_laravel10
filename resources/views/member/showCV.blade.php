<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV của tôi</title>
    <!-- Thêm CSS cần thiết ở đây -->
</head>
<body>
    <div class="container">
        <h1>CV của tôi</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($resume)
            <div class="cv">
                <p><strong>Tên tệp CV:</strong> {{ $resume->file_path }}</p>
                <a href="{{ url('cv/' . $resume->file_path) }}" target="_blank">Xem CV</a>
            </div>
        @else
            <p>Bạn chưa tải lên CV nào.</p>
        @endif
    </div>
</body>
</html>