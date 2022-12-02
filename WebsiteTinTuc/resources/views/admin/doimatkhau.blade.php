@extends('admin.layout.index')
@section('tittle')
    Đổi mật khẩu
@endsection
@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Đổi mật khẩu</a>
                            </nav>
                        </div>
                    </div>
                       @if(session('thongbao'))
                           <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-body">
                            <h4>Đổi mật khẩu</h4>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu hiện tại">
                                           @error('password')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="password_new" placeholder="Nhập mật khẩu mới">
                                           @error('password_new')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nhập lại mật khẩu mới</label>
                                        <input type="password" class="form-control" name="c_password_new"  placeholder="Nhập lại mật khẩu mới">
                                           @error('c_password_new')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
    <!-- Content Wrapper END -->
@endsection
