@extends('pages.layouts.index')

@section('content')

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Danh sách bài tập</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Xem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 1</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt1') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 2</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 3</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt3') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 6</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt6') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 7</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt7') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 8</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt8') }}">Xem chi tiết</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
