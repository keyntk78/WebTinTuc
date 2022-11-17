@extends('admin.layout.index')

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
            <div class="card">
                <div class="card-body">
                        <h4>Danh sách người dùng</h4>                         
                        <div class="m-t-25">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
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
                                            <td>{{ $item->hoten }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->quyen }}</td>
                                            <td><a class="btn btn-primary" href="">Sửa</a></td>
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
