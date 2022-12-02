@extends('pages.layouts.index')
@section('tittle')
    Kết quả
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 1</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        $ketqua = "";
                        if(isset($_POST['submit'])) {
                        $sothu1 = $_POST['sothu1'];
                        $sothu2 = $_POST['sothu2'];
                        $pheptinh = $_POST['pheptinh'];

                            if (is_numeric($sothu1) || is_numeric($sothu2)) {
                                if ($pheptinh == "Cộng") {
                                    $ketqua = $sothu1+$sothu2;
                                }
                                if ($pheptinh == "Trừ") {
                                    $ketqua = $sothu1-$sothu2;
                                }
                                if ($pheptinh == "Nhân") {
                                    $ketqua = $sothu1*$sothu2;
                                }
                                if ($pheptinh == "Chia") {
                                    $ketqua = $sothu1/$sothu2;
                                }
                            } else {
                                $sothu1 = "Phải là số";
                                $sothu2 = "Phải là số";
                            }
                        }

                        if (isset($_POST['quaylai'])) {
                            header('location:baitap6.php');
                        }
                        ?>
                            <form action="" method="POST">
                                <table align="center">
                                    <tr>
                                        <th colspan="2">
                                            <h1 style="color: #406F9F;">PHÉP TÍNH TRÊN HAI SỐ</h1>
                                        </th>
                                    </tr>
                                    <tr style="color: red;">
                                        <td>Chọn phép tính</td>
                                        <td>
                                            <?php echo $pheptinh?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: blue;">Số 1:</td>
                                        <td><input type="text" name="sothu1" value="<?php echo $sothu1?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="color: blue;">Số 2:</td>
                                        <td><input type=" text" name="sothu2" value="<?php echo $sothu2?>"></td>
                                    </tr>
                                    <tr>
                                        <td style="color: blue;">Kết quả:</td>
                                        <td><input type="text" name="ketqua" value="<?php echo $ketqua?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="quaylai" value="Quay lại"></td>
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
