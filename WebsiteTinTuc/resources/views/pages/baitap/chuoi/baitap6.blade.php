@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 2</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php

                        function hoan_vi(&$a, &$b) {
                            $temp = $a;
                            $a = $b;
                            $b = $temp;
                        }


                        function sap_tang($arr) {
                            for ($i=0; $i < count($arr); $i++) { 
                                for ($j=$i + 1; $j < count($arr); $j++) { 
                                    if ($arr[$i] > $arr[$j]) {
                                        hoan_vi($arr[$i], $arr[$j]);
                                    }
                                }
                            }

                            return $arr;
                        }

                        function sap_giam($arr) {
                            for ($i=0; $i < count($arr); $i++) { 
                                for ($j=$i + 1; $j < count($arr); $j++) { 
                                    if ($arr[$i] < $arr[$j]) {
                                        hoan_vi($arr[$i], $arr[$j]);
                                    }
                                }
                            }

                            return $arr;
                        }


                        $day_so = "";
                        $tangdan = "";
                        $giamdan = "";

                        $erro = 0;
                        if(isset($_POST['submit'])){
                            $day_so = $_POST['dayso'];
                            $a = explode(",", $day_so);
                            
                            foreach($a as $value){
                                if (!is_numeric($value)) {
                                    $day_so = "Mãng không chứ ký tự!";
                                    $erro = 1;
                                }
                            }

                            if($erro == 0) {
                                $mangtang = sap_tang($a);
                                $manggiam = sap_giam($a);

                                $tangdan = implode(", ", $mangtang);
                                $giamdan = implode(", ", $manggiam);

                            }
                        }
                    ?>
                    <style>
                        table td {
                            padding-left: 20px;
                            padding-right: 20px;
                        }
                    </style>
                        <form action="" method="POST">
                            @csrf
                            <table align="center" bgcolor="#D1DED4">
                                <tr>
                                    <th bgcolor="#319B99" style="padding: 10px;" colspan="2">SẮP XẾP MẢNG</th>
                                </tr>
                                <tr>
                                    <td>Nhập mảng:</td>
                                    <td><input type="text" size="40" name="dayso" value="<?php echo $day_so; ?>"> (*)</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:140px ;">
                                        <input type="submit" name="submit" value="Sắp xếp tăng/giảm"
                                            style="padding:5px 10px; cursor: pointer;">
                                    </td>
                                </tr>
                                <tr bgcolor="#CCE6E7">
                                    <td colspan="2">Sau khi sắp xếp</td>
                                </tr>
                                <tr bgcolor="#CCE6E7">
                                    <td>Tăng dần:</td>
                                    <td><input type="text" readonly size="40" style="background-color: #C9FFFD;" name="tangdan"
                                            value="<?php echo $tangdan ;?>"></td>
                                </tr>
                                <tr bgcolor="#CCE6E7">
                                    <td>Giảm dần:</td>
                                    <td><input type="text" readonly size="40" style="background-color: #C9FFFD;" name="giamdan"
                                            value="<?php echo $giamdan ;?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <p> <span style="color: red;">(*)</span> Các dấu được nhập cách nhau bằng dấu ","</p>
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
