<?php
  //Kết nối dữ liệu database
  require 'connect.php';
  //Kích hoạt các biến giá trị session
  session_start();

  //Kiểm tra nếu chưa đăng nhập sẽ đẩy ra trang login yêu cầu đăng nhập
  if(!isset($_SESSION['login'])){
    header("location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>History</title>
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
            <!-- Hiển thị thao tác xem thông tin cá nhân, lịch sử đặt vé, đăng xuất khi người dùng đăng nhập thành công -->
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
              // Ản thao tác xem thông tin cá nhân, lịch sử đặt vé, đăng xuất khi không đăng nhập
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
              <!-- Lấy dữ liệu từ database, hiển thị list lịch sử đặt vé của khách hàng khi đã đăng nhập -->
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
        <a class="text-white" href="home.php">SkyAirlines.com.vn</a>
      </div>
  </footer>  
</body>
</html>