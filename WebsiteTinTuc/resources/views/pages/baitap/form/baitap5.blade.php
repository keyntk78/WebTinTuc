@extends('pages.layouts.index')
@section('tittle')
    Bài tập 5
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 5</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        $gioibatdau = "";
                        $gioiketthuc = "";
                        $tienthanhtoan = "";

                        if(isset($_POST['submit'])){
                            $gioibatdau=$_POST['gioibatdau'];
                            $gioiketthuc=$_POST['gioketthuc'];

                              if(is_numeric($gioibatdau) && is_numeric($gioiketthuc))
                                {
                                   if ($gioiketthuc > $gioibatdau) {
                                         if ($gioibatdau >= 17) {
                                         $tienthanhtoan = ($gioiketthuc - $gioibatdau)*45000;
                                        } else {
                                            $tienthanhtoan = ($gioiketthuc - $gioibatdau)*20000;
                                        }
                                   }else{
                                        $gioibatdau ="Giờ bắt đầu < giờ kết thúc";
                                   }

                                } else {
                                    $gioibatdau  = "Là số";
                                    $gioiketthuc  = "Là số";
                                }
                            }
                        //
                        // }
                    ?>
                    <form class="form" class="form" action="" method="post" >
                        @csrf
                        <table >
                            <tr>
                                <th colspan="2">
                                    <h1>TÍNH TIỀN KARAOKE</h1>
                                </th>
                            </tr>
                            <tr>
                                <td>Giờ bắt đầu:</td>
                                <td><input type="text" name="gioibatdau" value="<?php echo $gioibatdau ?>"> (h)</td>
                            </tr>
                            <tr>
                                <td>Giờ kết thúc:</td>
                                <td><input type="text" name="gioketthuc" value="<?php echo $gioiketthuc ?>"> (h)</td>
                            </tr>
                            <tr>
                                <td>Tiền thanh toán:</td>
                                <td><input type="text" name="tienthanhtoan" readonly style="background-color:lightyellow"
                                        value="<?php echo $tienthanhtoan ?>"> (vnđ)</td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><input type="submit" name="submit" value="Tính tiền"></td>
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
