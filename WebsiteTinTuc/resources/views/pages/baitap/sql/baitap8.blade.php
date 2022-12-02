@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
<style>
table {
    width: 600px;
}

a {
      text-decoration: none;
      color: darksea  ;
      padding: 0 10px;
    }

    a:hover {
      color: dark  ;
    }

    tr {
        border: 1px solid #000;
    }
</style>
 
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql - Bài tập 8</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="dk">
                        <h1 style="text-align:center;color:#AA1F00;font-style:italic">THÔNG TIN CÁC LOẠI SỮA</h1>
                        <table align="center">
                            <?php
                                $servername="localhost";
                                $username="root";
                                $password="";
                                $dbname="qlbansua";
                    
                                 $conn=mysqli_connect($servername, $username, $password, $dbname);
                                if(!$conn) echo "Kết nối thất bại";
                                mysqli_set_charset($conn, 'utf8');
                    
                                
                                $rowsPerPage=2; // số lượng dòng 1 trang
                                if ( ! isset($_GET['page']))
                                    $_GET['page'] = 1;
                                $offset =($_GET['page']-1)*$rowsPerPage;
                    
                                $query="SELECT * FROM `sua` LIMIT $offset, $rowsPerPage;";
                                
                                $result = mysqli_query($conn,$query);
                                if (!$result ) die ('<br> <b>Query failed</b>');
                                $numRows= mysqli_num_rows($result); // Số dòng
                                $maxPage = ceil($numRows / $rowsPerPage);
                                $duongdan =  asset('uploads/images/');
                                if($numRows != 0) {
                                    $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
                                    if($temp<=$rowsPerPage) $num=0;
                                    else $num=$temp-$rowsPerPage;
                              

                                     while($rows=mysqli_fetch_array($result))
                                    {
                                       echo '<tr bgcolor="#FFEEE6">
                                            <th colspan="2">
                                                <h1 style="color: #E1691B;">'.$rows["Ten_sua"].'</h1>
                                            </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                    <img width="160px" height ="110px" src="'.$duongdan.''."/".''.$rows["Hinh"].'" alt="Không có">
                                                </td>
                                                <td>
                                                   <p><b>Thành phần dinh dưỡng:</b></p>
                                                    <p>'.$rows["TP_Dinh_Duong"].'</p>
                                                    <b>Lợi ích</b>
                                                    <p>'.$rows["Loi_ich"].'</p>
                                                    <p><span><b>Trọng lượng: </b>'.$rows["Trong_luong"].'gr <b>Đơn giá: </b>'.$rows["Don_gia"].' VNĐ</span></p>
                                                </td>
                                        </tr>';
                                    }
                                }
                            ?>
                        </table>
                        <?php 
                            $re = mysqli_query($conn, 'select * from sua');
                            $numRows = mysqli_num_rows($re);
                            $maxPage = floor($numRows/$rowsPerPage) + 1;
                            echo "<div class=''>";
                                if ($_GET['page'] > 1){
                                    echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; //gắn thêm nút Back
                                }
                                for ($i=1 ; $i<=$maxPage ; $i++)
                                {
                                    if ($i == $_GET['page'])
                                    {
                                        echo ' <b class="center">' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
                                    }
                                    else {
                                        echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
                                    }
                                }
                                if ($_GET['page'] < $maxPage) {
                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
                                }
                                echo"</div>";
                        ?>
                    </div>
                    <img src="" alt="">
                </div>
            </div>
           
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
