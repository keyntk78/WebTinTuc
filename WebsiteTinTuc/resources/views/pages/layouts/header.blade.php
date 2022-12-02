    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="{{ route('trangchu') }}" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Tin</span>Tức</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                @if(Auth::check())
                    <a href="{{route("thongtinchitietcanhan")}}" class="login" >{{ Auth::user()->hoten }}</a>
                    <a href="{{route("dangxuat")}}" class="register">Đăng xuất</a>
                     <img class="avatar" width="50px" height="50px" src="{{ asset(PathImages(Auth::user()->avatar))}}" alt="">
                @else
                    <a href="{{route("dangnhap")}}" class="login" >Đăng nhập</a>
                    <a href="{{route('dangky')}}" class="login" >Đăng ký</a>
                @endif

            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Tin</span>Tức</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('trangchu') }}" class="nav-item nav-link active">Trang Chủ</a>
                    <a href="{{ route('video') }}" class="nav-item nav-link">Video</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thể loại</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            @if (!empty(getAllTheLoai()))
                                @foreach (getAllTheLoai() as $item)
                                    <a href="{{ route('thelloai', ['id'=>$item->id, 'tenkhongdau'=>$item->tenkhongdau]) }}" class="dropdown-item">{{ $item->tentheloai }}</a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                     <a href="{{ route('baitap.danhsach') }}" class="nav-item nav-link">Bài Tập</a>
                    <a href="{{route('thongtinngoai')}}" class="nav-item nav-link">Thông tin</a>
                </div>
               <form action="{{ route('timkiem') }}" method="GET">
                 <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                  <input type="text" class="form-control" name="tim_kiem" placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text text-secondary"><i
                                    class="fa fa-search"></i></button>
                        </div>
                </div>
               </form>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->




