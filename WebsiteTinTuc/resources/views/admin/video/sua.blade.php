@extends('admin.layout.index')

@section('content')
              <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Danh sách</a>
                                <span class="breadcrumb-item active">Sửa video</span>
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
                            <h4>Sửa video</h4>
                            <form action="" method="POST"  >
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tiêu đề</label>
                                        <input type="text" class="form-control" name="tieude" value="{{ old('tieude') ?? $chitietvideo->tieude }}">
                                           @error('tieude')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Link</label>
                                        <input type="text" class="form-control" name="link" value="{{ old('link') ?? $chitietvideo->link }}">
                                           @error('link')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
    <!-- Content Wrapper END -->
@endsection