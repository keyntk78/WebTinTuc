@extends('pages.layouts.index')

@section('tittle')
    Video
@endsection


@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
@endif
     <!-- Start: Nội dung-->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Các video mới nhất</h3>
                            </div>
                        </div>
                        @foreach ($dsVideo as $item)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <div class="overlay position-relative bg-light video">
                                           <iframe  width="100%" height="300" src="{{ $item->link }}" frameborder="0" allowfullscreen></iframe>
                                        </iframe>
                                        <div class="mb-2" style="font-size: 14px;">
                                            <span>{{ format_date($item->created_at) }}</span>
                                        </div>
                                         <a class="h4" href="">{{ $item->tieude }}</a>
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
                         {{ $dsVideo->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
             <!-- End: Phân trang -->
        </div>
    </div>
    </div>
    <!-- End: Nội dung -->
@endsection
