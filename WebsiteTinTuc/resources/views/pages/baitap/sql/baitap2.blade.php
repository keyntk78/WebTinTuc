@extends('pages.layouts.index')
@section('tittle')
    Bài tập 2
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <style>
        tr th {
            text-align: center;
            color: red;
        }

        tr:nth-child(even) {
            background-color: #FEE0C1;
        }

        table,
        tr {
            text-align: center;
        }

        th,
        td {
            text-align: left;
            padding: 1px;
        }
        </style>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql - Bài tập 2</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h1 style="text-align: center;color:#2A7FAA">THÔNG TIN KHÁCH HÀNG</h1>
    <table border="1" align="center">
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "quan_ly_ban_sua";

            $conn=mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn) echo "Kết nối thất bại";
            mysqli_set_charset($conn, 'utf8');
            $query = "SELECT * FROM khach_hang";
            $result = mysqli_query($conn,$query);
             if(mysqli_num_rows($result)!= 0){
                while($rows=mysqli_fetch_array($result))
                {
                    echo '<tr>
                        <td>'.$rows["Ma_khach_hang"].'</td>
                        <td>'.$rows["Ten_khach_hang"].'</td>
                        <td style="text-align: center;">'.$rows["Phai"].'</td>
                        <td>'.$rows["Dia_chi"].'</td>
                        <td>'.$rows["Dien_thoai"].'</td>
                    </tr>';
                }
            }
        ?>
    </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
