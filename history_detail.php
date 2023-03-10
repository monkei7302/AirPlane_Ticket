<?php
  //Kết nối dữ liệu database
  require 'connect.php';
  //Kích hoạt các biến giá trị session
  session_start();

  //Lưu giá trị id_ticket là id vé được chọn xem chi tiết
  $id_ticket = $_GET['id'];

  //Kiểm tra nếu chưa đăng nhập sẽ đẩy ra trang login yêu cầu đăng nhập
  if(!isset($_SESSION['login'])){
    header("location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>History Details</title>
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
    .back_button{
        font: bold 11px Arial;
        text-decoration: none;
        background-color: #0984e3;
        color: white;
        font-weight: bold;
        text-align: center;
        border-radius: 5px;
        width: 8%;
        padding: 10px;
        border-top: 1px solid #CCCCCC;
        border-right: 1px solid #333333;
        border-bottom: 1px solid #333333;
        border-left: 1px solid #CCCCCC;
        margin: 0;
        position: absolute;
        left: 45%;
        right: 50%;
        top: 100%
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
        <h1>Chi tiết vé đặt</h1>
        <di class = "row">
            <div class = "col-lg-12">
                <div class = "card mb-5">
                    <div class = "card-body">
                    <!-- Đoạn mã lấy dữ liệu từ database về thông tin khách hàng, thông tin vé, thông tin chuyến bay để hiển thị
                    chi tiết lịch sử đặt vé của người dùng khi đã đăng nhập -->
                    <?php
                        $sql_check = mysqli_query($con,"SELECT * FROM `ticket_info` WHERE `ticket_id` = '$id_ticket'");
                        while($row = $sql_check->fetch_array(MYSQLI_ASSOC)){
                            $pro_id = $row['profile_id'];
                            $flight_id = $row['flight_id'];
                            $ticket_price = $row['price'];
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
                        //Vòng lặp while lấy dữ liệu từ database và cập nhật vào thông tin để hiển thị lên màn hình
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
                                    <span style = "margin-right: 75px;"><b>Mã chuyến bay:</b> '.$_SESSION['flight_id'].'</span>
                                    <span> <b>Ghế ngồi: </b>'.$_SESSION['num_seat'].'</span>
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
                                    <h2 style  = "float: right; margin-top: 10px; margin-bottom: 10px;">'.number_format(floatval($ticket_price),0,',','.').' VND</h2>
                                    <br><br>
                                    <h4  style = "text-align: center; font-size: 18px; color: #4fba4b;"><i>(Đã thanh toán)</i></h4>
                                    
                                
                            ';
                        }
                    ?>
                     
                    </div>
                    
                </div>
                
            </div>
            <a href="historyLogin.php" class="back_button" >QUAY LẠI</a>
                    </div>
                </div>
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
        <a class="text-white" href="home.php">SkyAirlines.com.vn</a>
      </div>
  </footer>  
</body>
</html>