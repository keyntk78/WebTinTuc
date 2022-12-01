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
                                    <th scope="row">2</th>
                                    <td>Bài tập 2</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt2') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Bài tập 3</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt3') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Bài tập 4</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt4') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Bài tập 5</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt5') }}">Xem chi tiết</a></td>
                                </tr>

                                <tr>
                                    <th scope="row">6</th>
                                    <td>Bài tập 6</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt6') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Bài tập 7</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt7') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Bài tập 8</td>
                                    <td>Bài tập dạng form</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.form_bt8') }}">Xem chi tiết</a></td>
                                </tr>

                                <tr>
                                    <th scope="row">9</th>
                                    <td>Bài tập 1</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt1') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Bài tập 2</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt2') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Bài tập 3</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt3') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Bài tập 4</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt4') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>Bài tập 5</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt5') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td>Bài tập 6</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt6') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td>Bài tập 7</td>
                                    <td>Bài tập dạng chuỗi</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.chuoi_bt7') }}">Xem chi tiết</a></td>
                                </tr>

                                <tr>
                                    <th scope="row">16</th>
                                    <td>Bài tập 1</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt1') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td>Bài tập 2</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt2') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">18</th>
                                    <td>Bài tập 3</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt3') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">19</th>
                                    <td>Bài tập 4</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt4') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">20</th>
                                    <td>Bài tập 5</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt5') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">21</th>
                                    <td>Bài tập 6</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt6') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">22</th>
                                    <td>Bài tập 7</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt7') }}">Xem chi tiết</a></td>
                                </tr>
                                {{-- <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 8</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt8') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 9</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt9') }}">Xem chi tiết</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bài tập 10</td>
                                    <td>Bài tập dạng sql</td>
                                    <td><a class="btn btn-primary" href="{{ route('baitap.sql_bt10') }}">Xem chi tiết</a></td>
                                </tr> --}}
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
