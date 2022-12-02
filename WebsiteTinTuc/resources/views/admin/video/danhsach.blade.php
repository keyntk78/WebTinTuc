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
            <h4>Danh sách Video</h4>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tiêu đề không dấu</th>
                                <th scope="col">Link</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($video as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->tieude}}</td>
                                <td>{{$item->tieudekhongdau}}</td>
                                <td>{{$item->link}}</td>
                                <td><a class="btn btn-primary" href="{{route('video.sua', ['id'=>$item->id])}}">Sửa</a></td>
                                <td><a class="btn btn-danger" href="">Xóa</a></td>
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