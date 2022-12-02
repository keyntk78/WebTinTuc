@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
<style>
   
<style>
table {
    width: 600px;
}
</style>

    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <table align="center" border="1">

                            <?php 
                                $Ma_sua = $_GET['id'];
                                $servername="localhost";
                                $username="root";
                                $password="";
                                $dbname="quan_ly_ban_sua";
                                $conn=mysqli_connect($servername, $username, $password, $dbname);
                                mysqli_set_charset($conn, 'utf8');
                                $query = "SELECT * FROM `sua` WHERE Ma_sua = '$Ma_sua'";
                                $result = mysqli_query($conn,$query);
                                $row = mysqli_fetch_array($result);
                                $duongdan =  asset('uploads/images/');
                                
                                  echo '<tr bgcolor="#FFEEE6">
                                            <th colspan="2">
                                                <h1 style="color: #E1691B;">'.$row["Ten_sua"].'</h1>
                                            </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                    <img style="width: 160px; height: 110px;" src="'.$duongdan.''."/".''.$row["Hinh"].'" >
                                                </td>
                                                <td>
                                                   <p><b>Thành phần dinh dưỡng:</b></p>
                                                    <p>'.$row["TP_Dinh_Duong"].'</p>
                                                    <b>Lợi ích</b>
                                                    <p>'.$row["Loi_ich"].'</p>
                                                    <p><span><b>Trọng lượng: </b>'.$row["Trong_luong"].'gr <b>Đơn giá: </b>'.$row["Don_gia"].' VNĐ</span></p>
                                                </td>
                                        </tr>';
                            ?>
                            <tr>
                                <td>
                                    <a href="/bai-tap/sql/baitap7">Quay lại</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
