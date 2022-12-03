@extends('admin.layout.index')
@section('tittle')
    Thêm loại tin
@endsection
@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="{{ route('loaitin.index') }}">Danh sách</a>
                                <span class="breadcrumb-item active">Thêm loại tin</span>
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
                            <h4>Thêm loại tin</h4>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tên loại tin</label>
                                        <input type="text" class="form-control" name="tenloaitin" value="{{ old('tenloaitin') }}" placeholder="Nhập tên loại tin">
                                           @error('tenloaitin')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                {{-- {{$chitietUser->quyen == 1  ? 'selected' : false }} --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Thể loại</label>
                                        <select name="id_theloai" class="form-control">
                                            <option value="">Chọn thể loại</option>
                                            @if (!empty(getAllTheLoai()))
                                            @foreach (getAllTheLoai() as $item)
                                                <option value="{{$item->id}}" >{{$item->tentheloai}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('id_theloai')
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
