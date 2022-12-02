@extends('pages.layouts.index')
@section('tittle')
    Bài tập 4
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 4</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                            function tim_kiem($arr, $giatri) {
                                for ($i=0; $i < count($arr); $i++) {
                                    if ($arr[$i] == $giatri) {
                                        return $i;
                                    }
                                }

                                return -1;
                            }

                            $txt_dayso = "";
                            $giatri = "";
                            $mang = "";
                            $kq = "";

                            $erro = 0;

                            if(isset($_POST['submit']) && isset($_POST['dayso']) && isset($_POST['giatri'])){
                                $txt_dayso = $_POST['dayso'];
                                $giatri = $_POST['giatri'];

                                $a = explode(",", $txt_dayso);


                                foreach ($a as $value){
                                    if (!is_numeric($value)){
                                        $txt_dayso="Dãy số không được có kí tự";
                                        $erro = 1;
                                    }
                                }

                                if(!is_numeric($giatri)) {
                                    $giatri="Dãy số không được có kí tự";
                                    $erro = 1;
                                }


                                if($erro == 0) {
                                    $mang = implode(", ", $a );
                                    $kq_tim = tim_kiem($a, $giatri);
                                    if($kq_tim != -1) {
                                        $kq = "Đã tìm thấy " . $giatri . " tại vị trí thứ " . $kq_tim . " của mảng";
                                    } else {
                                        $kq = "Không tìm thấy " . $giatri . " trong mảng";
                                    }

                                }


                            }
                        ?>
                        <form action="" method="POST">
                            @csrf
                            <table align="center" bgcolor="#D1DED4">
                                <tr>
                                    <th colspan="2" align="center" bgcolor="#359998">
                                        TÌM KIẾM
                                    </th>
                                </tr>
                                <tr>
                                    <td>Nhập mảng:</td>
                                    <td><input type="text" name="dayso" size="50" value="<?php echo $txt_dayso;?>"></td>
                                </tr>
                                <tr>
                                    <td>Nhập số cần tìm:</td>
                                    <td><input type="text" name="giatri" value="<?php echo $giatri;?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" name="submit" value="Tìm kiếm"></td>
                                </tr>
                                <tr>
                                    <td>Mảng:</td>
                                    <td><input type="text" name="mang" readonly size="50" value="<?php echo $mang;?>"></td>
                                </tr>
                                <tr>
                                    <td>Kết quả tìm kiếm:</td>
                                    <td><input type="text" name="kq_tim" readonly size="50" value="<?php echo $kq;?>"></td>
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
