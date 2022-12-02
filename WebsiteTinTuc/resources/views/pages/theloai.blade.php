@extends('pages.layouts.index')

@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
@endif
     <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $tenTheLoai }}</h3>
                            </div>
                        </div>

                        @foreach ($dsTinTheoTL as $item)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                     <img class="img-fluid w-100 theloai" src="{{ asset(PathImages($item->hinh)) }}" style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light theloai">
                                        <div class="mb-2" style="font-size: 14px;">
                                           <a href="}">{{ $item->tenloaitin }}</a>
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
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
