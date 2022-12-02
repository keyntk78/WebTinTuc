<div class="header">
    <div class="logo logo-dark">
        <a href="{{ route('admin') }}">
            <img src="{{ asset("assets/images/logo/logo.jpg") }}" alt="Logo">
            <img style="width: 100%" class="logo-fold" src="{{ asset('assets/images/logo/logoTT.png') }}" alt="Logo">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            {{-- <img src="assets/images/logo/logo-white.png" alt="Logo"> --}}
            <img class="logo-fold" src="{{ asset('assets/images/logo/logoTT.png') }}" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{ asset(PathImages(Auth::user()->avatar))}}" alt="">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                 <img src="{{ asset(PathImages(Auth::user()->avatar))}}" alt="">
                                {{-- <img src="assets/images/avatars/thumb-3.jpg" alt=""> --}}
                            </div>
                            <div class="m-l-10">
                                <p style="padding-top: 13px" class="m-b-0 text-dark font-weight-semibold">{{ Auth::user()->hoten }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('thongtin') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Thông tin cá nhân</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="/admin/doimatkhau" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                <span class="m-l-10">Đổi mật khẩu</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('dangxuatadmin') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Đăng xuất</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
