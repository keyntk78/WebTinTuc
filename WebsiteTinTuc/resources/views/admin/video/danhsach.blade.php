@extends('admin.layout.index')

@section('tittle')
    Danh sách video
@endsection


@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ route('admin') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item" href="#">Danh sách</span>
                {{-- <span class="breadcrumb-item active">Basic Table</span> --}}
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Danh sách Video</h4>
            <div class="m-t-25">
                 <form action="" method="get" class="mb-3" >
                    <div class="row">
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
                                <th scope="col">Video</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Link</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>  
                            @foreach ($video as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                      <iframe  width="200" height="150" src="{{ $item->link }}" frameborder="0" allowfullscreen></iframe>
                                </td>
                                <td>{{$item->tieude}}</td>
                                <td>{{$item->link}}</td>
                                <td><a class="btn btn-primary" href="{{route('video.sua', ['id'=>$item->id])}}">Sửa</a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa video?')"  href="{{route('video.xoa',['id'=>$item->id])}}">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <div class="apagination">
                            {{ $video->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection