@extends('admin.layout.index')

@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Danh sách</a>
                                <span class="breadcrumb-item active">Thêm user</span>
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
                            <h4>Thêm User</h4>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Họ và tên</label>
                                        <input type="text" class="form-control" name="hoten" value="{{ old('hoten') }}" placeholder="Nhập họ tên ...">
                                           @error('hoten')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Nhập họ tên ...">
                                        @error('email')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu ...">
                                        @error('password')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                   <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" name="c_password" placeholder="Nhạp lại mật khẩu ...">
                                        @error('c_password')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
    <!-- Content Wrapper END -->
@endsection