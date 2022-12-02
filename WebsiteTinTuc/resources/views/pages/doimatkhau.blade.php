@extends('pages.layouts.index')

@section('tittle')
    Đổi mật khẩu
@endsection

@section('content')
    <!-- Start: Nội dung -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Đổi mật khẩu</h3>
            </div>
            @if(session('thongbao'))
            <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12" >
                    <div class="contact-form bg-light mb-3" style="padding: 30px;">
                        <div id="success"></div>
                        <form action="" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <label for="inputEmail4">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control p-4" name="password" placeholder="Nhập mật khẩu hiện tại">
                                           @error('password')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <label for="inputEmail4">Mật khẩu mới</label>
                                        <input type="password" class="form-control p-4" name="password_new" placeholder="Nhập mật khẩu mới">
                                           @error('password_new')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                       <label for="inputEmail4">Nhập lại mật khẩu mới</label>
                                        <input type="password" class="form-control p-4" name="c_password_new"  placeholder="Nhập lại mật khẩu mới">
                                           @error('c_password_new')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Nội dung -->
@endsection
