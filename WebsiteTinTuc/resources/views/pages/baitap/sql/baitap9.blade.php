@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
 

    <style>
        tr th {
            color: #F5314F;
            font-size: 20px;
            background-color: #FECCCD;
            padding: 10px 150px;
        }
        
        table {
            width: 800px;
        
        }
        
        h2,
        p,
        h4 {
            margin: 0;

        }

        h2 {
            
            color:#F5314F !important;
        }
        </style>
        
    
<?php 

$keyword = "";
if (isset($_GET["submit"])) {
    $keyword = $_GET["keyword"];
}


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quan_ly_ban_sua";

    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) echo "Kết nối thất bại";
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT * FROM `sua` WHERE Ten_sua LIKE '%$keyword%'";
    
    $result = mysqli_query($conn,$query);
    $duongdan =  asset('uploads/images/');



?>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql - Bài tập 9</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <table align="center">
                            <tr>
                                <th colspan="2">TÌM KIẾM THÔNG TIN SỮA</th>
                            </tr>
                            <tr align="center">
                                <td colspan="2">
                                    <form action="" method="GET">
                                        Tên sữa <input type=" text" name="keyword" value="<?php echo $keyword ?>">
                                        <button type="submit" name="submit">Tìm kiếm</button>
                                    </form>
                                <td>
                            </tr>
                    
                            <?php 
                                if (!empty($keyword)) {
                                    $numRows= mysqli_num_rows($result);
                                    if ($numRows == 0) {
                                            echo ' <tr align="center">
                                                <td colspan="2"> Không có sản phẩm nào</td>
                                            </tr>';
                                        }
                                    else {
                                        echo ' <tr align="center">
                                            <td colspan="2">Có '.$numRows.' sản phẩm tìm thấy</td>
                                        </tr>';
                                    }
                    
                                    if(mysqli_num_rows($result)!= 0){
                                        while($rows=mysqli_fetch_array($result))
                                        {
                                            echo '<tr>
                                                    <td colspan="2" style="border: 1px solid;" align="center"><h2 style="color:#FEC7B0">'.$rows["Ten_sua"].'</h2></td>
                                                </tr>';
                                            echo '
                                                <tr>
                                                    <td style="border: 1px solid;"><img width="120px" height ="130px" src="'.$duongdan.''."/".''.$rows["Hinh"].'" alt="Không có"></td>
                                                    <td style="border: 1px solid;">
                                                        <h4>Thành phần dinh dưỡng:</h4>
                                                        <p>'.$rows["TP_Dinh_Duong"].'</p>
                                                        <h4>Lợi ích:</h4>
                                                        <p><span style="font-weight: bold;">Trọng lượng: </span> <span style="color:red">'.$rows["Trong_luong"].' gr</span>  - <span style="font-weight: bold;">Đơn giá: </span><span style="color:red">'.$rows["Don_gia"].' VNĐ</span></p>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    }
                                }
                            ?>
                        </table>
                    <img src="" alt="">
                </div>
            </div>
           
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
