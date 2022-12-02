@extends('pages.layouts.index')

@section('tittle')
    Thông tin tài khoản
@endsection

@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
@endif
        <!-- Start: Nội dung -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Thông tin chi tiết cá nhân</h3>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">Avatar</h6>
                       
                        <div class="d-flex align-items-center mb-5">
                            <img width="100px" height="100px" src="{{ asset(PathImages($chitietUser->avatar))}}" alt="">
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex flex-column">
                                <a href="{{ route('page_doimatkhau') }}"><h6 class="font-weight-bold">Đổi Mật Khẩu</h6></a>
                            </div>
                        </div>

                         <div class="d-flex align-items-center mb-3">
                            <div class="d-flex flex-column">
                                <a href="{{route("dangxuat")}}"><h6 class="font-weight-bold">Đăng Xuất</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form bg-light mb-3" style="padding: 30px;">
                        <div id="success"></div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="control-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" disabled class="form-control p-4" value="{{ old('email') ?? $chitietUser->email }}" placeholder="Email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="control-group">
                                        <label for="">Họ tên</label>
                                        <input type="text" name="hoten" class="form-control p-4" value="{{ old('hoten') ?? $chitietUser->hoten }}" placeholder="Nhập họ tên" />
                                        <p class="help-block text-danger"></p>
                                         @error('hoten')
                                                <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="control-group">
                                        <label for="">Cập nhật avatar</label>
                                        <input type="file" name="hinh" class="form-control p-6" value=""  />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" id="sendMessageButton">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Nội dung -->
@endsection
