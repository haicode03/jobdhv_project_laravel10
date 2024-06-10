@extends('layouts.app')

@section('contents')

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Thông báo của bạn</h2>
                <ul>
                    @foreach ($notifications as $notification)
                        <li>{{ $notification->data['message'] }} - {{ $notification->created_at->diffForHumans() }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
