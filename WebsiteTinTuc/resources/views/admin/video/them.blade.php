@extends('admin.layout.index')

@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Danh sách</a>
                                <span class="breadcrumb-item active">Thêm video</span>
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
                            <h4>Thêm video</h4>
                            <form action="{{route('video.post-them')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tên video</label>
                                        <input type="text" class="form-control" name="tieude" value="{{ old('tieude') }}" placeholder="Nhập tên video">
                                           @error('tieude')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Link</label>
                                        <input type="text" class="form-control" name="link" value="{{ old('tieude') }}">
                                           @error('link')
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