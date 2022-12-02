@extends('admin.layout.index')
@section('tittle')
    Danh sách
@endsection
@section('content')
      < class="main-content">

          <div class="page-header">
             <div class="header-sub-title">
                 <nav class="breadcrumb breadcrumb-dash">
                     <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                     <a class="breadcrumb-item" href="#">Danh sách</a>
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
                        <h4>Danh sách người dùng</h4>
                        <div class="m-t-25">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Họ và tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Quyền</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td><img width="100px" src="{{ asset(PathImages($item->avatar)) }}"></td>
                                            <td>{{ $item->hoten }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                            @if ($item->quyen == 0)
                                                Khách hàng
                                            @elseif($item->quyen == 1)
                                                Quản trị
                                            @else
                                                Người viết bài
                                            @endif
                                            </td>
                                            <td><a class="btn btn-primary" href="{{ route('users.edit', ['id'=>$item->id]) }}">Sửa</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('users.delete', ['id'=>$item->id]) }}">Xóa</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <div class="col-lg-12">
                                    <div class="apagination">
                                        {{ $user->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
      </div>
@endsection
