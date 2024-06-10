<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">Job DHV</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/home') }}" class="nav-item nav-link active">Trang chủ</a>
            
            <div class="nav-item dropdown">
                <a href="{{ url('/jobs/index') }}" class="nav-item nav-link">Công việc</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="/category" class="dropdown-item">Ngành nghề</a>
                    <a href="/feedback" class="dropdown-item">Đánh giá của khách hàng</a>
                    {{-- <a href="404.html" class="dropdown-item">404</a> --}}
                </div>
            </div>
            <a href="/contact" class="nav-item nav-link">Liên hệ</a>

            {{-- Kiểm tra đăng nhập --}}
            @if (Route::has('login'))
            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @if (Auth::user()->role_id == 2)
                        <a href="{{ url('/member/index_post') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Quản lý Jobs</a>
                        
                        <a href="{{ url('/member/application') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Quản lý hồ sơ ứng tuyển</a>

                        <a href="{{ url('/member/profile_company') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Hồ sơ công ty</a>

                        <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-3">Đăng xuất</a>
                        @elseif (Auth::user()->role_id == 3)
                        <a href="{{ url('/member/profile_candidate') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Quản lý sơ yếu lí lịch</a>
                        
                        <a href="{{ url('/member/notifications') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Thông báo công việc</a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Quản lý theo dõi</a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-3">Việc làm đề xuất</a>

                        <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-4">Đăng xuất</a>
                        @endif
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">login</a>
            {{-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-item nav-link">Đăng ký</a>
            @endif --}}
            @endauth
            @endif
        </div>
        @if (Auth::user()->role_id == 2)
        <a href="#" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Đăng tuyển<i class="fa fa-arrow-right ms-3"></i></a>
        @elseif (Auth::user()->role_id == 3)
        <a href="#" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Ứng tuyển<i class="fa fa-arrow-right ms-3"></i></a>
        @elseif (Auth::user()->role_id == 1)
        <a href="{{ route('admin/index') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Trang quản trị<i class="fa fa-arrow-right ms-3"></i></a>
        @endif
    </div>
</nav>
<!-- Navbar End -->