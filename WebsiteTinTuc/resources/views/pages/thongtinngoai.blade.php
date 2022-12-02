@extends('pages.layouts.index')
@section('tittle')
    Thành viên nhóm
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
                    <h3 class="m-0">Thông tin thành viên nhóm php</h3>
                </div>
            </div>
           </div>

           <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between bg-light mb-3">
                    <table class="table">
                     <thead>
                       <tr>
                         <th scope="col">Số thứ tự</th>
                         <th scope="col">Thành viên nhóm</th>
                         <th scope="col">Mã số sinh viên</th>
                         <th scope="col">Lớp học phần</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <th scope="row">1</th>
                         <td>Nguyễn Tuấn Kiệt</td>
                         <td>61133822</td>
                         <td>61cntt2</td>
                       </tr>
                       <tr>
                         <th scope="row">2</th>
                         <td>Trần Công Quyền</td>
                         <td>61130953</td>
                         <td>61cntt1</td>
                       </tr>
                       <tr>
                         <th scope="row">3</th>
                         <td>Nguyễn Huỳnh Thanh Hải</td>
                         <td>61133571</td>
                         <td>61cntt1</td>
                       </tr>
                       <tr>
                         <th scope="row">4</th>
                         <td>Nguyễn Văn Tâm</td>
                         <td></td>
                         <td>61cntt2</td>
                       </tr>
                       <tr>
                         <th scope="row">5</th>
                         <td>Nguyễn Xuân Trực</td>
                         <td>61134594</td>
                         <td>61cntt2</td>
                       </tr>
                       <tr>
                         <th scope="row">6</th>
                         <td>Nguyễn Đức Bình</td>
                         <td>61133407</td>
                         <td>61cntt2</td>
                       </tr>
                       <tr>
                         <th scope="row">7</th>
                         <td>Trương Ngọc Tuấn</td>
                         <td>62132542</td>
                         <td>62cntt3</td>
                       </tr>
                     </tbody>
                   </table>
                  </div>
            </div>
           </div>
        </div>
    </div>
    <!-- Main News Slider End -->
@endsection
