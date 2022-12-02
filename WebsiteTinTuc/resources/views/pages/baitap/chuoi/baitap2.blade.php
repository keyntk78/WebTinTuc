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
                    if(isset($_POST['submit']) && isset($_POST['dayso'])){
                        $txt_dayso=$_POST['dayso'];
                        //$a=explode(seprator:",",$txt_dayso);
                        $a=explode(",",$txt_dayso);
                        foreach ($a as $value){
                            if (!is_numeric($value)){
                                $txt_dayso="Dãy số không được có kí tự";
                            }
                        }
                        $kq=array_product($a);
                    }
                    ?>
                    <form  class="form" action="" method="post">
                        @csrf
                        <table align="center" bgcolor="lightpink" width="auto">
                            <tr>
                                <td bgcolor="lightblue" colspan="2" align="center">
                                    <h2>Tính Tích</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>Nhập dãy số: </td>
                                <td><input type="text" name="dayso" value="<?php if(isset($txt_dayso)) echo $txt_dayso; ?>" size="30"
                                        placeholder="Các số cách nhau bằng dấu ,"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" style="background: rgb(241, 241, 140) " value="Tính Tích">
                                </td>
                            </tr>
                            <tr>
                                <td>Kết quả:</td>
                                <td align="center" colspan="2"><input type="text" style="background-color: lightgreen " name="Ketqua" value="<?php if(isset($kq)) echo $kq ?>"
                                        size="30"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <p style="color: red">(*) Các số được nhập cách nhau bởi ","</p>
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
