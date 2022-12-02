@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 1</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php

                            function demSOChan($arr, $n) {
                                $dem = 0;
                                for($i=0;$i<$n;$i++) {
                                    if ($arr[$i] % 2 == 0) {
                                        $dem++;
                                    }
                                }

                                return $dem;
                            }

                            function dembe100($arr, $n) {
                                $dem = 0;
                                for($i=0;$i<$n;$i++) {
                                    if ($arr[$i] < 100) {
                                        $dem++;
                                    }
                                }

                                return $dem;
                            }

                            $kq = "";
                            $n = "";
                            $dem = 0;
                            $dembe100 = 0;
                            if (isset($_POST["submit"])) {
                                $n = $_POST["n"];
                                $arr = array();
                                if(filter_var($n, FILTER_VALIDATE_INT) && $n > 0){
                                    for ($i=0; $i < $n; $i++) { 
                                        $arr[$i] = rand(-200,200);
                                    }   

                                    $dem = demSOChan($arr, $n);
                                    $dembe100 = dembe100($arr, $n);
                                } else {
                                    $kq = "Số nguyên dương";
                                }
                                
                            }
                        ?>

                            <form class="form" action="" method="POST">
                                @csrf
                                <table  align="center">
                                    <tr>
                                        <td>Nhập n</td>
                                        <td><input type="text" name="n"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" name="submit" value="Thực hiện">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <?php 
                                            echo "MẢNG: ";
                                            for($i=0; $i < $n; $i++) { 
                                                echo $arr[$i]. ", ";
                                            }
                                        ?>
                                        </>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php
                                                echo "Số phần tử là số chẳn: $dem </br>";
                                                echo "Số phần tử nhỏ hơn 100: $dembe100 </br>";
                                            ?>
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
