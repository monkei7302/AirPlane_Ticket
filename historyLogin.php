<?php
  require 'connect.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .btn {
       float: right;
       margin-right: 15px;
    }
    .card-text{
        font-size: 15px;
        margin-left: 10px;
    }
    .id {
        font-weight: bold;
    }
    .locate{
        font-weight: 500;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="home.php" style = "font-size: 30px;">Sky Airlines
            <div class="logo">
                <img src="img/plane.png" class="img-fluid">
            </div>
          </a>
        </a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"><i class="fa fa-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item aria-current">
              <a class="nav-link" href="search_flight.php"> Chuyến bay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">Tra cứu</a>
            </li>
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
            <li class="nav-item">
              <a class="nav-link" href="help.php"> Trợ giúp</a>
            </li>
          </ul>
        </div>
      </nav> 
    <div class="container">
        <h1>Lịch sử đặt vé</h1>
        <di class = "row">
            <div class = "col-lg-12">
              <?php
                $sql_check = mysqli_query($con,"SELECT * FROM `ticket_info`");
                while($row = $sql_check->fetch_array(MYSQLI_ASSOC)){
                  $flight_id = $row['flight_id'];
                  $ticket_id = $row['ticket_id'];

                  $sql_flight = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` = '$flight_id'");
                  while($row_flight = $sql_flight->fetch_array(MYSQLI_ASSOC)){
                    $from = $row_flight['from_location'];
                    $to = $row_flight['to_location'];
                    $departure_time = $row_flight['departure_time'];
                    echo '
                    <div class="card">
                      <div class = "card-text">
                          <span class = "id">'.$ticket_id.'</span>
                          <br>
                          <div class = "locate">
                              <span>'.$from.' -></span><span>'.$to.'</span>
                              <a href="history_detail.php?id='.$ticket_id.'"  class = "btn btn-danger btn-sm">Xem chi tiết</a>
                          </div>
                          <span>16/12/2022</span>
                          <br>
                      </div>
                    </div>
                    ';
                  }
                }
              ?>
            </div>
            <!-- <div class = "col-lg-6">
                <div class = "card mb-5">
                    <div class = "card-body">
                        <h2>TICKET00000001</h2>
                        <h4>Thông tin khách hàng</h4>
                        <span style = "margin-right: 100px;"><b>Họ: </b>Lê</span>
                        <span style = "margin-right: 100px;"><b>Tên: </b> Ngân</span>
                        <span><b>Giới tính: </b>Nữ</span>
                        <br>
                        <span><b>Địa chỉ: </b>19 Nguyễn Hữu Thọ, Tân Phong, Quận 7,  TP. Hồ Chí Minh</span>
                        <br>
                        <span style = "margin-right: 100px;"><b>Số điện thoại: </b>0909.291.123</span>
                        <span> <b>Email liên hệ: </b>nganle1234@gmail.com</span>
                        <h4>Thông tin vé máy bay</h4>
                        <span><b>Mã đặt vé: </b>TICKET00000001</span>
                        <br>
                        <span><b>Loại vé: </b>Phổ thông</span>
                        <br>
                        <span><b>Số người: </b>3</span>
                        <br>
                        <span><b>Kiểu vé: </b>Một chiều</span>
                        <br>
                        <span style = "margin-right: 75px;"><b>Điểm đi:</b> Hồ Chí Minh - Việt Nam (HCM)</span>
                        <span> <b>Điểm đến: </b>BangKok - Thái Lan (BK)</span>
                        <br>
                        <span style = "margin-right: 240px;"><b>Ngày đi:</b> 16/12/2022</span>
                        <span> <b>Ngày về:</b></span>
                        <br>
                        <span><b>Thời gian khởi hành: </b>3.25 PM</span>
                        <br>
                        <span><b>Thời gian đến dự kiến: </b>5.00 PM</span>
                        <br>
                        <h4>Thông tin hãng bay</h4>
                        <span><b>Hàng hàng không Sky Airlines</b></span>
                        <h2 style  = "float: right; margin-top: 10px; margin-bottom: 10px;">1.950.000đ</h2>
                        <br><br>
                        <h4  style = "text-align: right; font-size: 18px; color: #4fba4b"><i>(Đã thanh toán)</i></h4>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
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
                <i class="fa fa-ticket" aria-hidden="true"></i><a href="search_flight.html" class="text-white"> Vé máy bay</a>
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
        <a class="text-white" href="home.html">SkyAirlines.com.vn</a>
      </div>
  </footer>  
</body>
</html>