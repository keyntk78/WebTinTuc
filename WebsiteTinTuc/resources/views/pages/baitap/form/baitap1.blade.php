@extends('pages.layouts.index')
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
                            $dai = '';
                            $rong = "";
                            $dientich = "";

                            if(isset($_POST['submit'])){
                                $dai=$_POST['chieudai'];
                                $rong=$_POST['chieurong'];
                                if(isset($dai) and isset($rong) and is_numeric($dai) and is_numeric($rong))
                                {
                                    $dientich=$dai*$rong;
                                }
                            }
                        ?>
                        <form class="form" action="{{ route('baitap.post_form_bt1') }}" method="post">
                              @csrf
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chiều dài:</td>
                                    <td><input type="text" name="chieudai" value="<?php echo $dai;?>"></td>
                                </tr>
                                <tr>
                                    <td>Chiều rộng:</td>
                                    <td><input type="text" name="chieurong" value="<?php  echo $rong;?>"></td>
                                </tr>
                                <tr>
                                    <td>Diện tích:</td>
                                    <td><input type="text" name="dientich" readonly style="background-color: #FFDCDC"
                                            value="<?php  echo $dientich;?>"></td>
                                </tr>
                                <tr>
                                    <td coslpan="2" align="center"><input type="submit" name="submit" value="Tinh"></td>
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
