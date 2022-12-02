@extends('pages.layouts.index')

@section('tittle')
    Đăng nhập
@endsection

@section('content')
    <!-- Start: Nội dung -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Đăng nhập</h3>
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
                                        <label for="">Email</label>
                                        <input type="email" class="form-control p-4" name="email" placeholder="Nhập email ..." data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                        @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <label for="">Mật khẩu</label>
                                        <input type="password" class="form-control p-4" name="password" placeholder="Nhập mật khẩu ..." data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                        @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Nội dung -->
@endsection
