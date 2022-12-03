@extends('admin.layout.index')
@section('tittle')
    Thêm thể loại
@endsection
@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="{{ route('theloai.index') }}">Danh sách</a>
                                <span class="breadcrumb-item active">Thêm thể loại</span>
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
                            <h4>Thêm thể loại</h4>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tên thể loại</label>
                                        <input type="text" class="form-control" name="tentheloai" value="{{ old('tentheloai') }}" placeholder="Nhập tên thể loại">
                                           @error('tentheloai')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Hình ảnh</label>
                                        <input type="file" class="form-control" name="hinh" value="{{ old('hinh') }}">
                                           @error('hinh')
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
