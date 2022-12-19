<?php
  require 'api/connect.php';
  session_start();
  if(isset($_POST['find_flight'])){
    $over12 = $_POST['numberOfPassenger_over12'];
    $lower12 = $_POST['numberOfPassenger_lower12'];
    $_SESSION['baby'] = $_POST['numberOfPassenger_lower2'];
    $start = $_POST['start'];
    $destination = $_POST['destination'];
    $day_start = $_POST['day_start'];
    $_SESSION['adult'] = $lower12 +  $over12;

  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/flight_search.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
          <ul class="nav nav-pills navbar-expand-lg mx-auto mt-3 justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="search_flight.html" style = "background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chuyến bay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signedluggage.php" style = "border: 1px solid #6db7cb; border-radius: 25px;">Hành lý</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Chỗ ngồi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Thông tin đặt chỗ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Kiểm tra và thanh toán</a>
            </li>
          </ul>        
    <div class="container mt-3">
      <h1 style = "text-align: center;">Chọn vé máy bay</h1>   
        <div class="row">
        <form action="search_flight.php" method="post" >
            <div class="card w-75 mx-auto mt-3 mb-3" id = "searchCard" style="padding-left: 10px;"> 
                <div class = "radio passenger">
                <span>Người lớn (từ 12 tuổi trở lên):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_over12" type="number" value="<?php if(isset($over12)){echo $over12;} else{echo 0;}?>">
                  <span>Trẻ em (dưới 12 tuổi):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_lower12" type="number" value="<?php if(isset($lower12)){echo $lower12;} else{echo 0;}?>">
                  <span>Em bé (dưới 2 tuổi):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_lower2" type="number" value="<?php if(isset($lower2)){echo $lower2;} else{echo 0;}?>">
              </div>
              <div>
                <select id="start" class="form-select" aria-label="Default select example" style = "width: 45%" name="start" id="start"> 
                  <option selected><?php if(isset($_POST['find_flight'])){ if($start == "Điểm đi"){
                    echo "Chọn điểm đi";
                  }
                  else if(isset($start)){
                    echo $start;
                  }}
                  else{
                    echo "Chọn điểm đi";
                  }

                  ?></option>
                </select>
                <select id="des" class="form-select" aria-label="Default select example" style = "width: 45%" name="destination"> 
                  <option selected><?php if(isset($_POST['find_flight'])){ if($destination == "Điểm đến"){
                    echo "Chọn điểm đến";
                  }
                  else if(isset($destination)){
                    echo $destination
                    ;
                  }}
                  else{
                    echo "Chọn điểm đến";
                  }
                  ?></option>
                </select>
              </div>
              <div class = "radio">
                <span>Chọn ngày đi: </span>
                <input type = "date" id = "ngayDi" style = "margin-right: 150px;" value="<?php if(isset($day_start)){echo $day_start;}?>"  name="day_start" required>
                <br><br>
              </div>
              <button type="submit" id = "searchButton" class="btnHover btn text-white mx-auto mt-3 mb-3" name="find_flight">Tìm chuyến bay <i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
            </div>
        </form>
            <div class="card">
                <div class="card-body">
                    <h5>Chuyến bay đi</h5>
                    <span><span class="fa fa-plane"></span>  <b><?php if(isset($start)) {echo $start;}?> đến <?php if(isset($destination)){echo $destination;}?> </b> – 
                    <?php
                    if(isset($day_start)){
                      $day = explode("-", $day_start);
                      $start_date = 'Ngày '.$day[2].'/'.$day[1].'/'.$day[0];
                      echo $start_date;
                    }
                    ?>
                  </span>
                
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card" style="height: 100%; width: 100%;">
                    <div class="card-body">
                        <span style="font-weight: bold;font-size: 24px;">Bộ lọc</span>
                        <span style="margin-left: 140px;color: rgb(201, 195, 195);" id="remove-filter">Xóa lọc</span>
                        <form>
                            <ul id="filters-1" class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h6>Hạng chuyến bay</h6>
                                        <div style="margin-bottom: 5px;">
                                            <input type="checkbox" class="check-btn-1" name="flight-class" id="flight-class" value="PT"><span style="font-size: 16px; margin-left:10px">Phổ thông</span></input><br>
                                        </div>
                                        <div>
                                            <input type="checkbox" class="check-btn-1" name="flight-class" id="flight-class" value="TG"><span style="font-size: 16px;margin-left:10px">Thương gia</span></input>
                                        </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div id = "card-container-start"class="col-lg-8 mt-3">
            </div>            
        </div>
    </div>
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
</body>
<script>
    let btn_remove_checked = document.getElementById("remove-filter");
    btn_remove_checked.addEventListener('click',removeChecked);
    function removeChecked(){
        let flight_class_checked = document.getElementsByName("flight-class[]");
        let departure_time_checked = document.getElementsByName("departure-time[]");
        let arrival_time_checked = document.getElementsByName("arrival-time[]");
        for(let i = 0;i < flight_class_checked.length;i++){
            flight_class_checked[i].checked = false;
        }
        for(let j = 0;j < departure_time_checked.length;j++){
            departure_time_checked[j].checked = false;
            arrival_time_checked[j].checked = false;
        }
    }
</script>

<script src="script/search_script.js"></script>
</html>