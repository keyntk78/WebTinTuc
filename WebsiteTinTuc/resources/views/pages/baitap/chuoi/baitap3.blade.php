@extends('pages.layouts.index')
@section('tittle')
    Bài tập 3
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 3</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                                function tao_mang ($n) {
                                    $arr = array();
                                    for ($i=0; $i < $n; $i++) {
                                        $arr[$i] = rand(0,20);
                                    }
                                    return $arr;
                                }

                                function xuat_mang ($arr) {
                                    $kq_mang = implode(" ", $arr);
                                    return $kq_mang;
                                }

                                function tim_max($arr){
                                    $max = $arr[0];
                                    for ($i=1; $i < count($arr); $i++) {
                                        if($max < $arr[$i]) $max = $arr[$i];
                                    }
                                    // $max = max($arr);
                                    return $max;
                                }

                                function tim_min($arr) {
                                    $min = $arr[0];
                                    for($i = 1; $i < count($arr); $i++){
                                        if($min > $arr[$i]) $min = $arr[$i];
                                    }
                                    return $min;
                                }

                                function tinh_tong($arr) {
                                    $sum = 0;
                                    for($i = 1; $i < count($arr); $i++){
                                        $sum += $arr[$i];
                                    }
                                    return $sum;
                                }

                                $sopt = '';
                                $mang_kq = '';
                                $max = '';
                                $min = '';
                                $tong = '';
                                if(isset($_POST['submit']) && isset($_POST['sopt'])) {
                                    $sopt = $_POST['sopt'];
                                    $mang = tao_mang($sopt);
                                    $mang_kq = xuat_mang($mang);
                                    $max = tim_max($mang);
                                    $min = tim_min($mang);
                                    $tong = tinh_tong($mang);
                                }
                            ?>
                            <form class="form" action="" method="POST">
                                @csrf
                                <table align="center" bgcolor="lightpink">
                                    <tr>
                                        <th bgcolor="#A70F74" colspan="2" align="center">
                                            <h2 style="color: #fff;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Nhập số phần tử:</td>
                                        <td><input type="text" name="sopt" size="20" value="<?php echo $sopt;?>"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" name="submit" style="background-color: rgb(245, 245, 111)" value="Phát sinh và tính toán">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mảng:</td>
                                        <td><input type="text" style="background-color: pink" name="mang" size="30" readonly value="<?php echo $mang_kq;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>GTLN (MAX) trong mảng:</td>
                                        <td><input type="text" name="gtln" style="background-color: pink" size="10" readonly value="<?php echo $max;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>TTNN (MIN) trong mảng:</td>
                                        <td><input type=" text" name="ttnn" style="background-color: pink" size="10" readonly value="<?php echo $min;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Tổng mảng:</td>
                                        <td><input type="text" name="tong" style="background-color: pink" size="10" readonly value="<?php echo $tong;?>"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p style="color: red">(Ghi chú: các giá trị trong mảng sẽ có giá trị từ 0 đến 20)</p>
                                        </td>
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
