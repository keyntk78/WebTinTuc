@extends('pages.layouts.index')
@section('tittle')
    Bài tập 7
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 7</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        $sothu1 = "";
                        $sothu2 = "";
                        ?>
                        <form class="form" action="{{ route('baitap.ketquapheptinh') }}" method="POST">
                            @csrf
                            <table align="center">
                                <tr>
                                    <th colspan="2">
                                        <h1 style="color: #406F9F;">PHÉP TÍNH TRÊN HAI SỐ</h1>
                                    </th>
                                </tr>
                                <tr style="color: red;">
                                    <td>
                                        <h3>Chọn phép tính</h3>
                                    </td>
                                    <td>
                                        <input type="radio" name="pheptinh" checked value="Cộng"> Cộng
                                        <input type="radio" name="pheptinh" value="Trừ"> Trừ
                                        <input type="radio" name="pheptinh" value="Nhân"> Nhân
                                        <input type="radio" name="pheptinh" value="Chia"> Chia
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: blue;">Số thứ nhất</td>
                                    <td><input type="text" name="sothu1" value="<?php echo $sothu1?>"></td>
                                </tr>
                                <tr>
                                    <td style="color: blue;">Số thứ hai</td>
                                    <td><input type="text" name="sothu2" value="<?php echo $sothu2?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit" value="Tính"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
