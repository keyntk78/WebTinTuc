@extends('pages.layouts.index')
@section('tittle')
    Bài tập 8
@endsection
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                 <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Bài tập form - Bài tập 8</h3>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <?php
                        if(isset($_POST['submit'])){
                            echo "Bạn đã nhập thành công, dưới đây là thông tin bạn đã nhâp <br>";
                            echo "Họ tên: "." ".$_POST['hoten']."<br>";
                            echo "Địa chỉ: "." ".$_POST['diachi']."<br>";
                            echo "Giới tính: "." ".$_POST['sex']."<br>";
                            echo "Quốc gia: ".$_POST['country']."<br>";
                            echo "Notes: ".$_POST['notes'];
                        }
                            ?>
                            <form class="form" action="" method="post">
                                @csrf
                                <table>
                                  <h2>Enter Your Information</h2>
                                  <tr>
                                    <td>Fullname:</td>
                                    <td><input type="text" name="hoten" /></td>
                                  </tr>
                                  <tr>
                                    <td>Address:</td>
                                    <td><input type="text" name="diachi" /></td>
                                  </tr>
                                  <tr>
                                    <td>Phone:</td>
                                    <td><input type="text" name="dienthoai" /></td>
                                  </tr>
                                  <tr>
                                    <td>Gender:</td>
                                    <td>
                                      <input type="radio" name="sex" value="nam" />Nam
                                      <input type="radio" name="sex" value="nu" />Nu
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Country:</td>
                                    <td>
                                      <select name="country" id="country">
                                        <option value="VietNam">Việt Nam</option>
                                        <option value="My">Mỹ</option>
                                        <option value="Japan">Japan</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Study:</td>
                                    <td>
                                      <input type="checkbox" value="PHP" name="it1" />
                                      <label for=" it1 "> PHP </label>
                                      <input type="checkbox" value="ASP.NET" name="it2" />
                                      <label for=" it2 "> ASP.NET </label>
                                      <input type="checkbox" value="CCNA" name="it3" />
                                      <label for=" it3 "> CCNA </label>
                                      <input type="checkbox" value="Security+" name="it4" />
                                      <label for=" it4 "> Security </label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>notes:</td>
                                    <td>
                                      <input type="text" name="notes" size="50" style="width: 300px" />
                                    </td>
                                  </tr>
                                  <tr align="center">
                                    <td><input type="submit" name="submit" value="Gửi" /></td>
                                    <td><input type="submit" name="remove" value="hủy" /></td>
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
