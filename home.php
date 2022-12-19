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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  .btn {
    background-color: #6db7cb;
    color: white;
    font-size: 16px;
  }
  .btnHover:hover {
    background-color: #52da4d;
    color: white;
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
      <div class="mx-auto ml-5 ">
        <img src="img/banner.png" alt="background" width="100%" height="650px">
      </div>
      <div class="container mt-3">
          <div class="row">
            <form action="search_flight.php" method="post" >
              <div class="card w-75 mx-auto" id = "searchCard"  style="padding-left: 10px;">
                    <div class="card-body">
                    <div class="radio fs-6" >
                        <input type="radio" class='radio-btn-1' id="radio1" name="ticket_type" value="Two-way" required><span style="margin-right: 250px;"> Khứ hồi</span>
                        <input type="radio" id="radio2" name="ticket_type" value="One-way" required><span> Một chiều</span>
                      </div>
                    </div>
                    <div class = "radio passenger">
                      <span>Người lớn (từ 12 tuổi trở lên):</span>
                      <input aria-label="quantity" class="input-qty" max="2" min="0" name="numberOfPassenger_over12" type="number" value="0">
                      <span>Trẻ em (dưới 12 tuổi):</span>
                      <input aria-label="quantity" class="input-qty" max="7" min="0" name="numberOfPassenger_lower12" type="number" value="0">
                      <span>Em bé (dưới 2 tuổi):</span>
                      <input aria-label="quantity" class="input-qty" max="2" min="0" name="numberOfPassenger_lower2" type="number" value="0">
                    </div>
                    <div>
                    <select id = "start" class="form-select" aria-label="Default select example" style = "width: 45%" name="start" required="true"> 
                      <option label="Chọn điểm đi" value="">Điểm đi</option>
                    </select>
                    <select id = "destination" class="form-select" aria-label="Default select example" style = "width: 45%" name="destination" required="true"> 
                      <option label="Chọn điểm đến" value="">Điểm đến</option>
                    </select>
                  </div>
                  <div class = "radio">
                    <span>Chọn ngày đi: </span>
                    <input type = "date" id = "ngayDi" style = "margin-right: 150px;" name="day_start" required>
                    <br><br>
                    <span>Chọn ngày về: </span>
                    <input type = "date" id = "ngayVe" name="day_back">
                    <span>(Nếu chọn khứ hồi)</span>
                    <br>
                  </div>
                  <button type="submit" id = "searchButton" class="btnHover btn text-white mx-auto mt-3 mb-3" name="find_flight">Tìm chuyến bay <i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
              </div>
            </form>
              <div class = "symbols">
                <img src = "img/symbols/anh1.png" width="250px" height="250px" style="margin-right: 30px">
                <img src = "img/symbols/anh2.png" width="250px" height="250px">
                <img src = "img/symbols/anh3.png" width="250px" height="250px" style="margin-right: 30px">
                <img src = "img/symbols/anh4.png" width="250px" height="250px">
              </div>
              <h3 id="h3_hl">Chặng bay nổi bật của Sky Airlines</h3>
              <?php
                    $sql_hl = "SELECT * FROM `hight_light`";
                    $run_hl = mysqli_query($con,$sql_hl);
                    while($row = $run_hl->fetch_array(MYSQLI_ASSOC)){
                      $id_hl = $row['id_hight'];
                      $name_hl = $row['flight_name'];
                      $image_hl = $row['image'];
                      $date_hl = $row['date'];
                      $des_hl = $row['description'];
                      $price_hl = $row['price'];
                      echo '
                      <div class="col-sm-4">
                        <div class="highlights">
                          <div class="card">
                            <img src="img/highlights/'.$image_hl.'" class="card-img-top">
                            <div class="card-body">
                              <h5 class="card-title">'.$name_hl.'</h5>
                              <p class="card-text">Ngày đi: '.$date_hl.'</p>
                              <p class="card-text">'.$des_hl.'</p>
                              <h5 class = "text-danger font-weight-bold">Giá chỉ từ: '.number_format(floatval($price_hl),0,',','.').' đ</h5>
                              <a href="#" class="btnHover btn mt-3">Tìm hiểu thêm</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                    }
                ?>
            </div>
            <h3>Những điểm đến nổi bật</h3>
            <div class = "img-fluid">
              <div id="slideshow">
                <div class="slide-wrapper">
                  <div class="slide"><img src= "img/recommend/img1.png" width="1100px" height="510px" ></div>
                  <div class="slide"><img src="img/recommend/img2.png" width="1100px" height="510px"></div>
                  <div class="slide"><img src="img/recommend/img3.png" width="1100px" height="510px"></div>
                  <div class="slide"><img src="img/recommend/img4.png" width="1100px" height="510px"></div>
                </div>
              </div>  
            </div>
          </div>
      </div>

      <br>      
      <footer class="bg-dark text-center text-lg-start text-white">
        <div class="container p-4">
          <div class="row mt-4">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">về chúng tôi</h5>
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Tập đoàn</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Đội bay</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Cam kết với khách hàng</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Các điều kiện và điều khoản</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Sản phẩm</h5>
    
              <ul class="list-unstyled">
                <li>
                  <i class="fa fa-ticket" aria-hidden="true"></i><a href="search_flight.html" class="text-white"> Vé máy bay</a>
                </li>
                <li>
                  <i class="fa fa-bell-o" aria-hidden="true"></i> <a href="#!" class="text-white"> Combo khuyến mãi</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Đối tác thanh toán</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-white">
                    <div>
                      VISA
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#!" class="text-white">
                    <div>
                      MASTERCARD
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#!" class="text-white">
                    <div>
                      MOMO
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#!" class="text-white">
                    <div>
                      ZALOPAY
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">liên hệ</h5>    
              <ul class="list-unstyled">
                <li>
                  <a class="text-white"><i class="fa fa-phone" aria-hidden="true"></i> SDT: 0909.120.128</a>
                </li>
                <li>
                  <a class="text-white"><i class="fa fa-location-arrow" aria-hidden="true"></i> Email: skyairlines@gmail.com</a>
                </li>
                <li>
                  <a class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ: Quận 7, TP. Hồ Chí Minh</a>
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

      <!-- Script -->
      <script src="script/home_script.js"></script>
</body>                
</html>