@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 2</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                            define('PI',3.14);
                            $r = "";
                            $s = "";
                            $p = "";
                            if (isset($_POST['submit'])){
                                $r=$_POST['bankinh'];;
                                if (isset($r) and is_numeric($r) and $r>0){
                                    $s=round(PI*$r*$r,1);
                                    $p=round(2*PI*$r,1);
                                }else{
                                    $r="ban kinh phai la so hoac khong duoc de trong";
                                }
                            }
                        ?>
                        <form class="form" action="" method="post">
                            @csrf
                            <table>
                                <tr>
                                    <td colspan="2" >
                                        <h1>Diện tích và chu vi hình tròn</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bán Kính</td>
                                    <td> <input type="text" name="bankinh" value="<?php echo $r;?>" size="30"></td>
                                </tr>
                                <tr>
                                    <td>Diện tích</td>
                                    <td> <input type="text" name="area" readonly value="<?php  echo $s;?>"
                                            size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chu vi</td>
                                    <td> <input type="text" name="chuvi" readonly
                                            value="<?php  echo $p;?>" size="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="submit" value="Tính">
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
