@extends('admin.layout.index')
@section('tittle')
    Trang Admin
@endsection
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $soluongbinhluan }}</h2>
                            <p class="m-b-0 text-muted">Bình luận</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                           <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $soluongtintuc }}</h2>
                            <p class="m-b-0 text-muted">Tin tức</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $soluongvideo }}</h2>
                            <p class="m-b-0 text-muted">Video</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ $soluongnguoidung }}</h2>
                            <p class="m-b-0 text-muted">Người Dùng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
