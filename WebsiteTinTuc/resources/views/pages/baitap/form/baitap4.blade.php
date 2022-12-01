@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 4</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        $toan = "";
                        $ly = "";
                        $hoa = "";
                        $diemchuan = "";
                        $ketqua = "";
                        $tongdiem = "";

                        if(isset($_POST['submit'])){
                            $toan=$_POST['toan'];
                            $ly=$_POST['ly'];
                            $hoa=$_POST['hoa'];
                            $diemchuan=$_POST['diemchuan'];
                            $ketqua=$_POST['ketquathi'];
                            if(isset($toan) && isset($ly) && isset($hoa) && isset($diemchuan))
                                if(is_numeric($toan) && is_numeric($ly) && is_numeric($hoa)){
                                    $tongdiem=$toan+$ly+$hoa;
                                    if($toan>0 && $ly>0 && $hoa>0 && $tongdiem>=$diemchuan){
                                        $ketqua="đậu";
                                    }
                                    else{
                                        $ketqua="rớt";
                                    }
                                }
                        }

                    ?>
                    <form class="form" action="" method="post">
                        @csrf
                        <table >
                            <tr>
                                <td colspan="2" align="center">
                                    <h2>KẾT QUẢ HỌC TẬP</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>Toán:</td>
                                <td><input type="text" name="toan" size="30" value="<?php echo $toan; ?>"></td>
                            </tr>
                            <tr>
                                <td>Lý:</td>
                                <td><input type="text" name="ly" size="30" value="<?php  echo $ly; ?>"></td>
                            </tr>
                            <tr>
                                <td>Hóa:</td>
                                <td><input type="text" name="hoa" size="30" value="<?php  echo $ly;?>"></td>
                            </tr>
                            <tr>
                                <td>Điểm chuẩn:</td>
                                <td><input type="text" name="diemchuan" size="30" value="<?php echo $diemchuan; ?>"></td>
                            </tr>
                            <tr>
                                <td>Tổng điểm:</td>
                                <td><input type="text" name="tongdiem" size="30" readonly style="background-color: lightyellow"
                                        value="<?php  echo $tongdiem; ?>"></td>
                            </tr>
                            <tr>
                                <td>Kết quả thi:</td>
                                <td><input type="text" name="ketquathi" size="30" readonly style="background-color: lightyellow"
                                        value="<?php  echo $ketqua; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="submit" value="Xem kết quả"></td>
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
