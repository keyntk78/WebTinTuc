@extends('pages.layouts.index')
@section('tittle')
    Thông tin chi tiết cá nhân
@endsection
@section('content')
@if(session('thongbao'))
<div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
@endif
    <!-- Main News Slider Start -->

    <div class="container-fluid py-3">
        <div class="container">
           <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Thông tin chi tiết cá nhân</h3>
                </div>
            </div>
           </div>

           <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between bg-light mb-3">

                    Hello


                  </div>
            </div>
           </div>
        </div>
    </div>
    <!-- Main News Slider End -->
@endsection
