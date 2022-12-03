@extends('admin.layout.index')
@section('tittle')
    Danh sách loại tin
@endsection
@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ route('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item" href="#">Danh sách</span>
                {{-- <span class="breadcrumb-item active">Thêm loại tin</span> --}}
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Danh sách loại tin</h4>
            <div class="m-t-25">
                 <form action="" method="get" class="mb-3" >
                    <div class="row">
                        <div class="col-lg-3">
                            <select name="id_theloai" class="form-control">
                                <option value="">-Chọn thể loại-</option>
                                @foreach (getAllTheLoai() as $item)
                                        <option value="{{ $item->id }}" {{ request()->id_theloai  == $item->id ? 'selected' : false }}>{{ $item->tentheloai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="search" name="keywords" class="form-control" placeholder="Từ khóa tìm kiếm..." value="{{ request()->keywords }}">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>

                                <th scope="col">Thể loại</th>
                                <th scope="col">Tên loại tin</th>
                                <th scope="col">Tên không dấu</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaitin as $key =>$item)
                            <tr>
                                <th scope="row" >{{$key+1}}</th>
                                <td>{{$item->tentheloai}}</td>
                                <td>{{$item->tenloaitin}}</td>
                                <td>{{$item->tenkhongdau}}</td>
                                <td><a class ="btn btn-primary"href="{{route('loaitin.sua', ['id'=>$item->id])}}">Sửa</a></td>
                                <td><a class ="btn btn-danger"href="{{route('loaitin.xoa', ['id'=>$item->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <div class="apagination">
                            {{ $loaitin->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
