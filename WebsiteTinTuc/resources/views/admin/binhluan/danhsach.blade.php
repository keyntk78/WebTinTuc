@extends('admin.layout.index')

@section('tittle')
    Danh sách bình luận
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
     @if(session('thongbao'))
    <div class="alert alert-success">
         {{ session('thongbao') }}
     </div>
 @endif
    <div class="card">
        <div class="card-body">
            <h4>Danh sách bình luận</h4>
            <div class="m-t-25">
            <form action="" method="get" class="mb-3" >
                   <div class="row">
                       <div class="col-lg-6">
                           <select name="id_tintuc" class="form-control">
                               <option value="">-Chọn tin tức-</option>
                                @foreach (getAllTinTuc() as $item)
                                        <option value="{{ $item->id }}" {{ request()->id_tintuc  == $item->id ? 'selected' : false }}>{{ $item->tieude }}</option>
                                @endforeach
                           </select>
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
                                <th scope="col">Tin tức</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Người dùng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dsBinhLuan as $key => $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{ $item->tieudetintuc }}</td>
                                 <td>{{ $item->noidung }}</td>
                                <td>{{ $item->hoten }}</td>

                                 <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{ route('binhluan.xoa', ['id'=>$item->id]) }}">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                         <div class="apagination">
                             {{ $dsBinhLuan->withQueryString()->links() }}
                         </div>
                     </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
    
@endsection