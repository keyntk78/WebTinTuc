@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập chuỗi - Bài tập 7</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php 
                        $mang_can = array("Qúy", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
                        $mang_chi = array("Hợi","Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất" );
                        $mang_hinh = array("hoi.jpg","ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "tyy.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg" );
                    
                        $duonglich = "";
                        $amlich = "";
                        $hinh = "";
                        if(isset($_POST['submit'])){
                            $duonglich = $_POST['duonglich'];
                            if (  $duonglich != "") {
                                $nam = $duonglich;
                                $nam = $nam - 3;
                                $can = $nam%10;
                                $chi = $nam%12;
                    
                                $amlich = $mang_can[$can];
                                $amlich = $amlich. " " . $mang_chi[$chi];
                    
                                $hinh = $mang_hinh[$chi];
                                $hinh = "<img src='./img/$hinh' width=\"200px\" height=\"200px\" >";
                            } else {
                                $duonglich = "Không được rõng";
                            }
                            
                           
                        } 
                    ?>
                    <style>
                        table td span {
                            margin-top: 10px;
                            display: block;
                            text-align: center;
                        }
                        
                        table td {
                            padding: 0 10px;
                        }
                    </style>
                    <form action="" method="POST">
                        @csrf
                        <table align="center" bgcolor="#B9EEFF">
                            <tr>
                                <th colspan="3" bgcolor="#1062C8">TÍNH NĂM ÂM LỊCH</th>
                            </tr>
                            <tr>
                                <td><span>Năm dương lịch</span> <br> <input type="text" name="duonglich"
                                        value="<?php echo $duonglich?>">
                                </td>
                                <td><input type="submit" name="submit" value="=>"></td>
                                <td><span>Năm âm lịch</span> <br> <input type="text" readonly name="amlich"
                                        value="<?php echo $amlich?>"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><?php echo $hinh;  ?></td>
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
