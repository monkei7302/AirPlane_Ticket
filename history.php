<?php
  require 'connect.php';
  session_start();

  if(isset($_POST['search'])){
    $id_ticket = $_POST['id_ticket'];
  }
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
    background-color:#6db7cb;
    color: white;
    font-size: 16px;
    margin-bottom: 18px;
    margin-left: 10px;
  }
  .btnHover:hover {
    background-color: #52da4d;
    color: white;
  }
  span {
    font-size: 18px;
  }
  h4 {
    margin-top: 20px;
    margin-bottom: 20px;
  }
  h1 {
    margin: 10px;
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
      <div class = "container mb-5">
        <h1 class = "text-center">Thông tin đặt vé</h1>
        <div class="row">
          <div class = "col-lg-8">
            <div class = "card" >
                <div class = "card-body">
                  <?php
                  if(isset($_POST['search'])){
                    $sql_search = "SELECT * FROM `ticket_info` WHERE `ticket_id` = '$id_ticket'";
                    $sql_search_run = mysqli_query($con, $sql_search);
                    $count = mysqli_num_rows($sql_search_run);
                    if($count != 0){
                      $sql_check = mysqli_query($con,"SELECT * FROM `ticket_info` WHERE `ticket_id` = '$id_ticket'");
                      while($row = $sql_check->fetch_array(MYSQLI_ASSOC)){
                        $pro_id = $row['profile_id'];
                        $flight_id = $row['flight_id'];
                        $status = $row['status'];
                      }
                      $sql_flight = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` = '$flight_id'");
                      while($row_flight = $sql_flight->fetch_array(MYSQLI_ASSOC)){
                        $from = $row_flight['from_location'];
                        $to = $row_flight['to_location'];
                        $departure_time = $row_flight['departure_time'];
                        $arrival_time = $row_flight['arrival_time'];
                        $price = $row_flight['price'];
                      }
                      $departure_time = explode(" ", $departure_time);
                      $arrival_time = explode(" ", $arrival_time);
                      $sql_pro = mysqli_query($con, "SELECT * FROM `passenger_profile` WHERE `profile_id` = '$pro_id'");
                      while($row_pro = $sql_pro->fetch_array(MYSQLI_ASSOC)){
                        echo '
                          
                                  <h2>'.$id_ticket.'</h2>
                                  <h4>Thông tin khách hàng</h4>
                                  <span style = "margin-right: 200px;"><b>Họ: </b> '.$row_pro['first_name'].'</span>
                                  <span style = "margin-right: 100px;"><b>Tên: </b> '.$row_pro['last_name'].'</span>
                                  <span><b>Giới tính: </b>'.$row_pro['gender'].'</span>
                                  <br>
                                  <span><b>Địa chỉ: </b>'.$row_pro['address'].'</span>
                                  <br>
                                  <span style = "margin-right: 100px;"><b>Số điện thoại: </b>'.$row_pro['phone'].'</span>
                                  <span> <b>Email liên hệ: </b>'.$row_pro['email'].'</span>
                                  <h4>Thông tin vé máy bay</h4>
                                  <span><b>Mã đặt vé: </b>'.$id_ticket.'</span>
                                  <br>
                                  <span style = "margin-right: 75px;"><b>Điểm đi:</b> '.$from.'</span>
                                  <span> <b>Điểm đến: </b>'.$to.'</span>
                                  <br>
                                  <span style = "margin-right: 240px;"><b>Ngày đi:</b> '.str_replace('-','/',date("d-m-Y", strtotime($departure_time[0]))).'</span>
                                  <span> <b>Ngày về:</b> '.$arrival_time[0].'</span>
                                  <br>
                                  <span><b>Thời gian khởi hành: </b>'.$departure_time[1].'</span>
                                  <br>
                                  <span><b>Thời gian đến dự kiến: </b>'.$arrival_time[1].'</span>
                                  <br>
                                  <h4>Thông tin hãng bay</h4>
                                  <span><b>Hàng hàng không Sky Airlines</b></span>
                                  <h2 style  = "float: right; margin-top: 10px; margin-bottom: 10px;">'.number_format(floatval($price),0,',','.').' VND</h2>
                                  <br><br>
                                  
                              
                        ';
                      }
                      if($status == "Paid"){
                        echo ' <h4  style = "text-align: right; font-size: 18px; color: #4fba4b"><i>(Đã thanh toán)</i></h4>';
                      }
                      else if($status == "None"){
                        echo ' <h4  style = "text-align: right; font-size: 18px; color: #e74c3c"><i>(Chưa thanh toán)</i></h4>';
                      }
                    }
                    else{
                      echo '<h5 style="text-align: center; margin-top: 30px "><b><i>Không tìm thấy vé!</i></b></h5>';
                      
                    }

                    
                  }
                  ?>
                     
                    </div>
                </div>
            </div> 
            <div class = "col-lg-4">
              <form action="history.php" method="post">
                <div class = "card">
                      <div class = "card-body" >
                          <h5>Nhập mã đặt vé</h5>
                          <input type = "text" name="id_ticket" required>
                          <button type="submit" class="btn btn-sm btnHover mt-3" name="search" vale="search">Tra cứu <i class="fa fa-search fa-1x" aria-hidden="true"></i></button> 
                      </div>
                  </div>
              </form>
                
            </div> 
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
          <a class="text-white" href="home.html">SkyAirlines.com.vn</a>
        </div>
    </footer>  
    </body>
</html>