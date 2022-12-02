@extends('pages.layouts.index')
@section('content')
    <!-- News With Sidebar Start -->
 
<style>
    table,
    tr {
        text-align: center;
    }
    
    ul {
        list-style-type: none;
        margin-left: -35px;
    }
    </style>
    
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập sql - Bài tập 7</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="quan_ly_ban_sua";
                        $conn=mysqli_connect($servername, $username, $password, $dbname);
                        mysqli_set_charset($conn, 'utf8');
                        $query = "SELECT * FROM sua 
                                 join loai_sua  on sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                                 join hang_sua  on sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
                        $result = mysqli_query($conn,$query);
                        if(!$result) die  ('<br><b>Query Failed</b>');
                    ?>
                    <table align='center' border="1">
                        <tr bgcolor='#FFEEE6'>
                            <td colspan='5'>
                                <h1 style="color: #E1691B;">THÔNG TIN CÁC SẢN PHẨM</h1>
                            </td>
                        </tr>
                        <?php
                            if(mysqli_num_rows($result)!=0)
                            {
                                $socot = 5;
                                $dem = 0;
                                $duongdan =  asset('uploads/images/');

                                while($rows=mysqli_fetch_array($result))
                                {
                                    if($dem == $socot)
                                    {
                                        echo "<tr>";
                                    }
                                    echo '<td>
                                        <ul align="center">
                                            <li><a href="chitietsanpham.php?id='.$rows["Ma_sua"].'"><b>'.$rows["Ten_sua"].'</b></a></li>
                                            <li>'.$rows["Trong_luong"].' gr - '.$rows["Don_gia"].' VNĐ</li>
                                             <li><img style="width: 110px; height: 110px;" src="'.$duongdan.''."/".''.$rows["Hinh"].'" ></li>
                                        </ul>
                                    </td>';
                                    if($dem==$socot-1)
                                    {
                                        echo "</tr>";
                                        $dem=0;
                                    }
                                    else $dem+=1;
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
