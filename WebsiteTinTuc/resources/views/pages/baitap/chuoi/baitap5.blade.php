@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 5</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php   

                            function thay_the($arr, $cu, $moi){
                                for ($i=0; $i < count($arr); $i++) { 
                                    if ($arr[$i] == $cu) {
                                        $arr[$i] = $moi;
                                    }
                                }

                                return $arr;
                            }

                            $day_so = '';
                            $gtCanThay = '';
                            $gtThay = "";
                            $mangcu = "";
                            $mangmoi = "";

                            $erro = 0;
                            if(isset($_POST['submit'])){
                                $day_so = $_POST['dayso'];
                                $gtCanThay = $_POST['gtc'];
                                $gtThay = $_POST['gt'];

                                $a = explode(",", $day_so);
                                // kiem tra dãy  số phải số hay ko
                                foreach ($a as $value) {
                                    if(!is_numeric($value)) {
                                        $day_so ="Dãy số không được có kí tự";
                                        $erro = 1;
                                    }
                                }

                                if(!is_numeric($gtCanThay)) {
                                    $gtCanThay = 'Không được là kí tự';
                                    $erro = 1;
                                }

                                if(!is_numeric($gtThay)) {
                                    $gtThay = 'Không được là kí tự';
                                    $erro = 1;
                                }

                                if ($erro == 0) {
                                    $mangcu = implode(", ", $a);
                                    $arr = thay_the($a, $gtCanThay, $gtThay);
                                    $mangmoi = implode(", ", $arr);
                                }

                            }
                        ?>
                        <form class="form" action="" method="POST">
                            @csrf
                            <table align="center">
                                <tr>
                                    <th colspan="2" align="center" bgcolor="#A10A72">THAY THẾ</th>
                                </tr>
                                <tr bgcolor="#FED6F1">
                                    <td>Nhập các phần tử:</td>
                                    <td><input type="text" name="dayso" size="40" value="<?php echo $day_so;?>"></td>
                                </tr>
                                <tr bgcolor="#FED6F1">
                                    <td>Giá trị cần thay thế:</td>
                                    <td><input type="text" name="gtc" size="20" value="<?php echo $gtCanThay;?>"></td>
                                </tr>
                                <tr bgcolor="#FED6F1">
                                    <td>Giá trị thay thế:</td>
                                    <td><input type="text" name="gt" size="20" value="<?php echo $gtThay;?>"></td>
                                </tr>
                                <tr bgcolor="#FED6F1">
                                    <td colspan="2" align="center"><input type="submit" style="background-color: rgb(241, 241, 82)" value="Thay thế" name="submit"></td>
                                </tr>
                                <tr bgcolor="#FFF5FF">
                                    <td>Mãng cũ:</td>
                                    <td><input type="text" name="mangcu" readonly size="40" style="background-color: #FBA6A1;"
                                            value="<?php echo $mangcu;?>"></td>
                                </tr>
                                <tr bgcolor="#FFF5FF">
                                    <td>Mãng cũ:</td>
                                    <td><input type="text" name="mangmoi" size="40" style="background-color: #FBA6A1;" readonly
                                            value="<?php echo $mangmoi;?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2", align="center" style="color: red">Các phần tử trong mảng sẽ cách nhau bằng dấu ","</td>
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
