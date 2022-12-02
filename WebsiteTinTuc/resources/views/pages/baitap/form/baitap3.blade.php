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
                                <h3 class="m-0">Bài tập form - Bài tập 3</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                                $dongia=2000;
                                $chisocu = "";
                                $chisomoi = "";
                                $thanhtien= "";
                                if(isset($_POST['submit'])){
                                    $chisocu=$_POST['chisocu'];
                                    $chisomoi=$_POST['chisomoi'];
                                    if(isset($chisocu) && is_numeric($chisocu) && isset($chisomoi) && is_numeric($chisomoi) && ($chisocu<$chisomoi)){
                                        $thanhtien=($chisomoi-$chisocu)*$dongia;
                                    }
                                    else
                                    {
                                        $chisocu="Nhập sai";
                                        $chisomoi="Nhập sai";
                                    }
                                }

                            ?>
                            <form class="form" action="" method="post">
                                @csrf
                                <table align="center" bgcolor="#FEF5D4">
                                    <tr>
                                        <td colspan="2" bgcolor="#FFD378">
                                            <h1>THANH TOÁN TIỀN ĐIỆN</h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chủ hộ</td>
                                        <td> <input type="text" name="chuho" value="" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>Chỉ số cũ</td>
                                        <td> <input type="text" name="chisocu" size="30" value="<?php
                                         echo $chisocu;
                                        ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Chỉ số mới</td>
                                        <td> <input type="text" name="chisomoi" value="<?php echo $chisomoi;?>" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>Đơn giá</td>
                                        <td> <input type="text" name="dongia" value="<?php  echo $dongia;?>" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>Thành tiền</td>
                                        <td> <input type="text" name="thanhtien" size="30" readonly style="background-color: lightpink"
                                                value="<?php  echo $thanhtien;?>"></td>
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
