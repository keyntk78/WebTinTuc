@extends('admin.layout.index')
@section('tittle')
    Danh sách loại tin
@endsection
@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="#">Danh sách</a>
                {{-- <span class="breadcrumb-item active">Thêm loại tin</span> --}}
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Danh sách loại tin</h4>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
