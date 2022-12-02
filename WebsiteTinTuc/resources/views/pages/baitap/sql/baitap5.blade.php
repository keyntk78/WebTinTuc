@extends('pages.layouts.index')
@section('tittle')
    Bài tập 5
@endsection
@section('content')
    <!-- News With Sidebar Start -->

<style>
    table,
    tr,
    td,
    th {
        border: 1px solid #16703681;
    }

    th {
        padding: 20px 40px;
        background-color: #FFEEE6;
        color: #FF6D0A;
    }


    td {
        padding: 10px 20px;
    }
    </style>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql - Bài tập 5</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <table align="center" border="">
                            <tr>
                                <th colspan="2">THÔNG TIN CÁC SẢN PHẨM</th>
                            </tr>
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "quan_ly_ban_sua";

                                $conn=mysqli_connect($servername, $username, $password, $dbname);
                                if(!$conn) echo "Kết nối thất bại";
                                mysqli_set_charset($conn, 'utf8');

                                $query = 'SELECT  hang_sua.Ten_hang_sua, sua.*, loai_sua.Ten_loai FROM `sua`
                                        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                                        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua';

                                $result = mysqli_query($conn,$query);
                                $duongdan =  asset('uploads/images/');
                                 if(mysqli_num_rows($result)!= 0){
                                    while($rows=mysqli_fetch_array($result))
                                    {
                                        echo ' <tr>
                                                    <td><img width="150px" height="120px"  src="'.$duongdan.''."/".''.$rows["Hinh"].'" alt="Không ảnh"></td>
                                                    <td>
                                                        <p style = "font-weight: bold;">'.$rows["Ten_sua"].'</p>
                                                        <p>Nhà sản xuất: '.$rows["Ten_hang_sua"].'</p>
                                                        <p>'.$rows["Ten_loai"].' - '.$rows["Trong_luong"].' - '.$rows["Don_gia"].'VNĐ'.'</p>
                                                    </td>
                                                </tr>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <img src="" alt="">
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
