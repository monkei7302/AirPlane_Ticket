<?php
session_start();
require 'connect.php';
if(isset($_POST['plane_seating'])){
    $seat_price = $_POST['seat_price'];
    $seat_id = $_POST['seat'];

    $obj = "";
    foreach($seat_id as $obj1){
      $obj .= $obj1." ";
    }

}
  $luggage = 400000;


$flight_id = $_SESSION['flight_id'];
$sql_locate = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` = '$flight_id'");
while($row_locate = $sql_locate->fetch_array(MYSQLI_ASSOC)){
  $from = $row_locate['from_location'];
  $to = $row_locate['to_location'];
  $date = explode(" ", $row_locate['departure_time']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inforbooking.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="script/inforBooking_script.js">
       if(isset($_SESSION['login'])){
          getProfile();
      }   
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container w-100">
            <a class="navbar-brand" href="home.php" style = "font-size: 30px;">Sky Airlines
                <div class="logo">
                    <img src="img/plane.png" class="img-fluid">
                </div>
              </a>
            </a>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="home.php"><i class="fa fa-home"></i> Trang chủ</a>
                </li>
                <li class="nav-item aria-current">
                  <a class="nav-link active" href="search_flight.php"> Chuyến bay</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="history.php">Tra cứu</a>
                </li>
                <li class="nav-item">
                <?php
              if(isset($_SESSION['login'])){
                echo '<li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> Welcome '.$_SESSION['username'].'</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php"> Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="historyLogin.php"> Lịch sử đặt vé</a></li>
                            <li><a class="dropdown-item" href="logout.php"> Đăng xuất</a></li>
                        </ul>
                      </li>';
              }
              else{
                echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng nhập</a>
                      </li>';
              }
            ?>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="help.php"> Trợ giúp</a>
                </li>
              </ul>
            </div>
        </nav> 
        <ul class="nav nav-pills navbar-expand-lg mx-auto mt-3 justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="search_flight.php" style = "background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chuyến bay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="signedluggage.php" style = "background-color: #6db7cb; border: 1px solid #6db7cb; border-radius: 25px;">Hành lý</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="planeSeating.php" style = "color: white; background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chỗ ngồi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inforbooking.php" style = "color: white; background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Điền thông tin và thanh toán</a>
            </li>
        </ul> 
        <h1 class = "text-center mt-3">Điền thông tin và thanh toán</h1>>
    </div>
    <form action="payment_handle.php" method="post">
        <input type = "hidden" name="seat_id" value="<?php echo $obj;?>">
        <div class="container">
            <div class="row mt-3">
                <h4>Thông tin liên hệ</h4>
                <div class="col-lg-6 mt-3">
                    Nhập họ<br>
                    <input type="hidden" id = "passenger_username" 
                    value="<?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['username'];
                    }                   
                    ?>">
                    <input id = "f_name" type="text" class="input-control" placeholder="Nhập họ và tên đệm" name="firstname" required/>
                </div>
                <div class="col-lg-6 mt-3">
                    Nhập Tên<br>
                    <input id = "l_name" type="text" class="input-control" placeholder="Nhập tên" name="lastname" required/>
                </div>
            </div>
            <div style="margin-top:15px">
                Chọn giới tính <br>
                <select id="gender" name="gender" required>
                    <option></option>
                    <option id="female" value="female">Nữ</option>
                    <option id="male" value="male">Nam</option>
                </select>
            </div>
            <div style="margin-top:15px">
                Nhập email<br>
                <input id="email" type="email" class="input-control" placeholder="Nhập email" name="email" required/>
            </div>
            <div style="margin-top:15px">
                Nhập số điện thoại<br>
                <input id="phone" type="number" class="input-control" placeholder="Nhập số điện thoại" name="phonenumber" required/>
            </div>
            
            <div class="card" style="margin-top: 100px;">
                <div class="card-body">
                <a href="#" class="btn-continue" data-bs-toggle="modal" data-bs-target="#payment">Thanh toán</a>
                    <span class="price"><?php echo number_format(floatval($_SESSION['price']*$_SESSION['adult']+$luggage+$seat_price),0,',','.')?> VNĐ</span>
                </div>
            </div>
        </div>
        <div class="modal" id="payment">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tóm tắt thanh toán</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    
                        <div class="modal-body">
                            <h5 class="modal-title" style="margin-bottom: 30px;text-align: center;">Chuyến bay từ <?php echo $from;?> đến <?php echo $to;?> <br> Ngày <?php echo str_replace('-','/',date("d-m-Y", strtotime($date[0])));?></h5>
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;font-size: 18px;">Giá vé</span><span style="float: right;font-size: 18px;"><?php if(isset($_SESSION)) echo number_format(floatval($_SESSION['price']),0,',','.') ;?> VNĐ X <?php echo $_SESSION['adult']?></span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;font-size: 18px;">Hành lý ký gửi</span><span style="float: right;font-size: 18px;"><?php echo number_format(floatval($luggage),0,',','.')?> VNĐ</span>
                            </div>
                            <div>
                                <span style="font-weight: bold;font-size: 18px;">Chỗ ngồi</span><span style="float: right;font-size: 18px;"><?php echo number_format(floatval($seat_price),0,',','.')?> VNĐ</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="total" value="<?php echo (floatval($_SESSION['price'])*floatval($_SESSION['adult']) + floatval($luggage) + floatval($seat_price));?>">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type = "submit" class="btn add-color" data-bs-toggle="modal" name="paid" value="paid">Thanh toán</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <footer class="bg-dark text-center text-lg-start text-white mt-5">
        <div class="container p-4">
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">về chúng tôi</h5>
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="aboutus.html" class="text-white">Tập đoàn</a>
                </li>
                <li>
                  <a href="aboutus.html" class="text-white">Đội bay</a>
                </li>
                <li>
                  <a href="aboutus.html" class="text-white">Cam kết với khách hàng</a>
                </li>
                <li>
                  <a href="aboutus.html" class="text-white">Các điều kiện và điều khoản</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Sản phẩm</h5>
    
              <ul class="list-unstyled">
                <li>
                  <i class="fa fa-ticket" aria-hidden="true"></i><a href="search_flight.php" class="text-white"> Vé máy bay</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Đối tác thanh toán</h5>
              <ul class="list-unstyled">
                <li>
                    <div>
                      VISA
                  </a>
                </li>
                <li>
                    <div>
                      MASTERCARD
                    </div>
                </li>
                <li>
                    <div>
                      MOMO
                    </div>
                </li>
                <li>
                    <div>
                      ZALOPAY
                    </div>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">liên hệ</h5>    
              <ul class="list-unstyled">
                <li>
                  <p class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> SDT: 0909.120.128</p>
                </li>
                <li>
                  <p class="text-white"><i class="fa fa-location-arrow" aria-hidden="true"></i> Email: skyairlines@gmail.com</p>
                </li>
                <li>
                  <p class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: Quận 7, TP. Hồ Chí Minh</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2022 Copyright:
          <a class="text-white" href="home.php">SkyAirlines.com.vn</a>
        </div>
    </footer>  
</body>
</html>