@extends('pages.layouts.index')

@section('tittle')
     {{ $keyword }}
@endsection

@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
@endif
     <!-- Start: nội dung -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Tìm kiếm: {{ $keyword }}</h3>
                            </div>
                        </div>
                        @foreach ($ketqua as $item)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                     <img class="img-fluid w-100 theloai" src="{{ asset(PathImages($item->hinh)) }}" style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light theloai">
                                        <div class="mb-2" style="font-size: 14px;">
                                           <a href="{{ route('loaitin', ['id'=>$item->id_loaitin, 'tenkhongdau'=>$item->tenkhongdau]) }}">{{ $item->tenloaitin }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ format_date($item->created_at) }}</span>
                                        </div>
                                         <a class="h4" href="{{ route('chitiettintuc', ['id'=>$item->id, 'tieudekhongdau'=>$item->tieudekhongdau]) }}">{{ $item->tieude }}</a>
                                        <p class="m-0">{{ $item->tomtat }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Start: Phân trang -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center">
                         {{ $ketqua->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
             <!-- End: Phân trang -->
        </div>
    </div>
    </div>
    <!-- End: nội dung-->
@endsection
