@extends('admin.layout.index')

@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="#">Danh sách</a>
                {{-- <span class="breadcrumb-item active">Basic Table</span> --}}
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Danh sách thể loại</h4>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Tên không dấu</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theloai as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td><img width="200px" src="{{ asset(PathImages($item->hinh)) }}"></td>
                                <td>{{$item->tentheloai}}</td>
                                <td>{{$item->tenkhongdau}}</td>
                                <td><a class="btn btn-primary" href="{{route('theloai.sua', ['id'=>$item->id])}}">Sửa</a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('theloai.xoa',['id'=>$item->id])}}">Xóa</a></td>
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