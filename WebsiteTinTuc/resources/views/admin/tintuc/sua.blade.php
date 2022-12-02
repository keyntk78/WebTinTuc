@extends('admin.layout.index')
@section('tittle')
    Sửa tin tức
@endsection
@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Danh sách</a>
                                <span class="breadcrumb-item active">Sửa tin tức</span>
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
                            <h4>Sửa Tin tức</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tiêu đề</label>
                                        <input type="text" class="form-control" name="tieude" value="{{ old('tieude') ?? $chitiettintuc->tieude  }}" placeholder="Nhập tiêu đề ...">
                                           @error('tieude')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Loại tin</label>
                                         <select name="id_loaitin" class="form-control">
                                            <option value="">---Chọn loại tin ---</option>
                                            @if (!empty(getAllLoaiTin()))
                                            @foreach (getAllLoaiTin() as $item)
                                                <option value="{{$item->id}}"
                                                    {{ old('id_loaitin')  == $item->id || $chitiettintuc->id_loaitin == $item->id  ? 'selected' : false }}
                                                    >{{$item->tenloaitin}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                           @error('id_loaitin')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tóm tắt</label>
                                        <textarea name="tomtat" class="form-control" cols="30" rows="10">{{ old('tomtat') ?? $chitiettintuc->tomtat }}</textarea>
                                        @error('tomtat')
                                                <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Nội dung</label>
                                        <textarea name="noidung" id="editor1" class="form-control" cols="30" rows="10">{{ old('noidung') ?? $chitiettintuc->noidung }}</textarea>
                                        @error('noidung')
                                                <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Hình ảnh</label>
                                        <p><img width="400px" src="{{ asset(PathImages($chitiettintuc->hinh)) }}"></p>
                                        <input type="file" class="form-control" name="hinh" value="{{ old('hinh') }}" placeholder="Nhập tiêu đề ...">
                                           @error('hinh')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nổi bật</label>
                                         <select name="noibat" class="form-control">
                                            <option value="1" {{$chitiettintuc->noibat == 1  ? 'selected' : false }}>Nổi bật</option>
                                            <option value="0" {{$chitiettintuc->noibat == 0  ? 'selected' : false }}>Không nổi bật bật</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>

                  <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.

                        CKEDITOR.replace( 'editor1', {
                            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}'
                        } );
                    </script>
    <!-- Content Wrapper END -->
@endsection
