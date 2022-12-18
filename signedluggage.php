<?php
    require 'connect.php';
    session_start();
    
    if(isset($_POST['choose_ticket'])){
        $start = $_POST['start'];
        $destination = $_POST['destination'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $flight_id = $_POST['flight_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signedluggage.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>   
</head>
<style>
    .nav-pills a {
    color: #6db7cb;
    text-align: center;
    margin-left: 0;
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
                <li class="nav-item active">
                  <a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="search_flight.html"> Chuyến bay</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="history.html">Tra cứu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">Đăng nhập</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="help.html"> Trợ giúp</a>
                </li>
              </ul>
            </div>
    </nav> 
    <ul class="nav nav-pills navbar-expand-lg mx-auto mt-3 justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="search_flight.html" style = "background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chuyến bay</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="signedluggage.php" style = "background-color: #6db7cb; border: 1px solid #6db7cb; border-radius: 25px;">Hành lý</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Chỗ ngồi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Điền thông tin và thanh toán</a>
      </li>
    </ul> 
    <h1 style="text-align:center">Chọn hành lý</h1>
    <div style="margin-left: 20px;">
        <h2 onclick="check()">Chuyến bay đi(đến)</h2>
        <span><span class="fa fa-plane"></span>  <b><?php echo $start;?> đến <?php echo $destination;?></b> – Ngày <?php echo str_replace('-','/',date("d-m-Y", strtotime($date))) ;?></span><br><br>
        <span style="font-weight: bold;font-size: 24px;">Hành lý ký gửi</span><br>
        <span>Quý khách làm thủ tục cho hành lý ký gửi trước khi đến cổng và sẽ không thể mang hành lý ký gửi lên máy bay.</span><br>
    </div>
    <div class="container mt-3">
        <form action="planeSeating.php" method="post">
            <input type="hidden" name="price" value="<?php echo $price?>">
            <input type="hidden" name="flight_id" value="<?php echo $flight_id?>">
            <div class="row">
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="0" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/no_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">0 kg</span><br>
                                <span class="price-luggage">0 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="20" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/icon_20kg_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">20 kg</span><br>
                                <span class="price-luggage">200.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="25" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/icon_25kg_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">25 kg</span><br>
                                <span class="price-luggage">250.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="30" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/icon_30kg_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">30 kg</span><br>
                                <span class="price-luggage">300.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="35" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/icon_35-40kg_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">35 kg</span><br>
                                <span class="price-luggage">350.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="40" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="css/imageCSS/icon_35-40kg_luggage.png" height="50%" width="50%"><br>
                                <span class="weight-luggage">40 kg</span><br>
                                <span class="price-luggage">400.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="card" style="margin-top: 180px;">
                    <div class="card-body">
                        <button type="submit" class="btn-continue" name="choose_luggage" value="luggage">Tiếp tục</button>
                        <span class="price"><?php echo $price . " + Giá tiền hành lý VNĐ";?></span>
                    </div>
                </div>
            </div>
        </form>
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