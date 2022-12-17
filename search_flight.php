<?php
  require 'connect.php';
  session_start();

  if(isset($_POST['find_flight'])){
    $ticket_type = $_POST['ticket_type'];
    $over12 = $_POST['numberOfPassenger_over12'];
    $lower12 = $_POST['numberOfPassenger_lower12'];
    $lower2 = $_POST['numberOfPassenger_lower2'];
    $start = $_POST['start'];
    $destination = $_POST['destination'];
    $day_start = $_POST['day_start'];
    $day_back = $_POST['day_back'];
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
        <a class="navbar-brand" href="home.html" style = "font-size: 30px;">Sky Airlines
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
                            <li><a class="dropdown-item" href="#"> Lịch sử đặt vé</a></li>
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
              <a class="nav-link" href="signedluggage.html" style = "border: 1px solid #6db7cb; border-radius: 25px;">Hành lý</a>
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
                <div class="card-body">
                  <div class="radio fs-6">
                    <input type="radio" id="radio1" name="ticket_type" <?php if (isset($ticket_type) && $ticket_type=="Two-way") echo "checked";?> value="Two-way" required><span style="margin-right: 250px;"> Khứ hồi</span>
                    <input type="radio" id="radio2" name="ticket_type" <?php if (isset($ticket_type) && $ticket_type=="One-way") echo "checked";?> value="One-way" required><span> Một chiều</span>
                  </div>
                </div>
                <div class = "radio passenger">
                <span>Người lớn (từ 12 tuổi trở lên):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_over12" type="number" value="<?php if(isset($over12)){echo $over12;} else{echo 0;}?>">
                  <span>Trẻ em (dưới 12 tuổi):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_lower12" type="number" value="<?php if(isset($lower12)){echo $lower12;} else{echo 0;}?>">
                  <span>Em bé (dưới 2 tuổi):</span>
                  <input aria-label="quantity" class="input-qty" max="50" min="0" name="numberOfPassenger_lower2" type="number" value="<?php if(isset($lower2)){echo $lower2;} else{echo 0;}?>">
              </div>
              <div>
                <select class="form-select" aria-label="Default select example" style = "width: 45%" name="start"> 
                  <option selected><?php if($start == "Điểm đi"){
                    echo "Điểm đi";
                  }
                  else{
                    $sql_check_st = "SELECT * FROM `start_place` WHERE `id_start` LIKE '$start' OR `name_start` LIKE '%$start%'";
                    $sql_check_st_run = mysqli_query($con,$sql_check_st);
                    while($row = $sql_check_st_run->fetch_array(MYSQLI_ASSOC)){
                      $name_st = $row['name_start'];
                    }
                    echo $name_st;
                  }
                  ?></option>
                  <?php
                         $sql_st = "SELECT * FROM `start_place`";
                         $run_st = mysqli_query($con,$sql_st);
                         while($row_st = mysqli_fetch_array($run_st)):;
                      ?>
                      <option value="<?php echo $row_st['id_start'];?>"><?php echo $row_st['name_start'];?></option>
                      <?php endwhile; ?>
                </select>

                <select class="form-select" aria-label="Default select example" style = "width: 45%" name="destination"> 
                  <option selected><?php if($destination == "Điểm đến"){
                    echo "Điểm đến";
                  }
                  else{
                    $sql_check_des = "SELECT * FROM `destination` WHERE `id_des` LIKE '$destination' OR `name_des` LIKE '%$destination%'";
                    $sql_check_des_run = mysqli_query($con,$sql_check_des);
                    while($row = $sql_check_des_run->fetch_array(MYSQLI_ASSOC)){
                      $name_des = $row['name_des'];
                    }
                    echo $name_des;
                  }
                  ?></option>
                  <?php
                         $sql_ds = "SELECT * FROM `destination`";
                         $run_ds = mysqli_query($con,$sql_ds);
                         while($row_ds = mysqli_fetch_array($run_ds)):;
                      ?>
                      <option value="<?php echo $row_ds['id_des'];?>"><?php echo $row_ds['name_des'];?></option>
                      <?php endwhile; ?>
                </select>
              </div>
              <div class = "radio">
                <span>Chọn ngày đi: </span>
                <input type = "date" id = "ngayDi" style = "margin-right: 150px;" value="<?php if(isset($day_start)){echo $day_start;}?>"  name="day_start" required>
                <br><br>
                <span>Chọn ngày về: </span>
                <input type = "date" id = "ngayVe" value="<?php if(isset($day_back)){echo $day_back;}?>" name="day_back">
                <span>(Nếu chọn khứ hồi)</span>
                <br><br>
              </div>
              <button type="submit" id = "searchButton" class="btnHover btn text-white mx-auto mt-3 mb-3" name="find_flight">Tìm chuyến bay <i class="fa fa-search fa-1x" aria-hidden="true"></i></button>
            </div>
        </form>
            <div class="card">
                <div class="card-body">
                    <h5>Chuyến bay đi</h5>
                    <span><span class="fa fa-plane"></span>  <b>Tp. Hồ Chí Minh đến Đà Nẵng </b> –Thứ Bảy 24 Tháng Mười Hai 2022</span>
                
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card" style="height: 100%; width: 100%;">
                    <div class="card-body">
                        <span style="font-weight: bold;font-size: 24px;">Bộ lọc</span>
                        <span style="margin-left: 140px;color: rgb(201, 195, 195);" id="remove-filter">Xóa lọc</span>
                        <form>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h6>Hạng chuyến bay</h6>
                                        <div style="margin-bottom: 5px;">
                                            <input type="checkbox" class="check-btn" name="flight-class[]" id="flight-class" value="Phổ thông"><span style="font-size: 16px; margin-left:10px">Phổ thông</span></input><br>
                                        </div>
                                        <div>
                                            <input type="checkbox" class="check-btn" name="flight-class[]" id="flight-class" value="Thương gia"><span style="font-size: 16px;margin-left:10px">Thương gia</span></input>
                                        </div>
                                </li>
                                <li class="list-group-item">
                                    <h6>Thời gian</h6> 
                                    <span style="font-weight: bold;">Giờ khởi hành</span>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="departure-time[]" id="departure-time" value="0-6"><span style="font-size: 16px; margin-left:10px">00:00-06:00</span></input><br>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="departure-time[]" id="departure-time" value="0-12"><span style="font-size: 16px;margin-left:10px">06:00-12:00</span></input>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="departure-time[]" id="departure-time" value="12-18"><span style="font-size: 16px;margin-left:10px">12:00-18:00</span></input>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="departure-time[]" id="departure-time" value="18-24"><span style="font-size: 16px;margin-left:10px">18:00-24:00</span></input>
                                    </div>
                                    <span style="font-weight: bold;">Giờ đến</span>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="arrival-time[]" id="arrival-time" value="0-6"><span style="font-size: 16px; margin-left:10px">00:00-06:00</span></input><br>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="arrival-time[]" id="arrival-time" value="0-12"><span style="font-size: 16px;margin-left:10px">06:00-12:00</span></input>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="arrival-time[]" id="arrival-time" value="12-18"><span style="font-size: 16px;margin-left:10px">12:00-18:00</span></input>
                                    </div>
                                    <div style="margin-bottom: 5px;">
                                        <input type="checkbox" class="check-btn" name="arrival-time[]" id="arrival-time" value="18-24"><span style="font-size: 16px;margin-left:10px">18:00-24:00</span></input>
                                    </div>
                                </li>
                            </ul>
                            <button id="btn-filter">Lọc</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="flight-route">
                                    <div style="margin-right: 50px;">
                                        <span style="font-weight: bold;">05:20</span><br>
                                        <span>SGN</span>
                                    </div> 
                                    <div>
                                        <span class="fa">&#xf041;</span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="fa fa-plane"></span><br>
                                        <span style="margin-left: 30px;">1h30m</span>
                                    </div>
                                    <div style="margin-left: 50px;">
                                        <span style="font-weight: bold;">17:20</span><br>
                                        <span>DAD</span>
                                    </div> 
                                </div>
                            </li>
                            <li class="list-group-item">
                                <span>Phổ thông</span>
                                <span style="font-weight: bold;margin-left: 75px;">1.120.000 VNĐ</span>
                                <button class="btn-seedel-ticket" data-bs-toggle="modal" data-bs-target="#seedetail">Xem chi tiết</button>
                                <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                            </li>
                        </ul>
                        <div class="modal" id="seedetail">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hồ Chí Minh (SGN) - Đà Nẵng (DAD)</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Chuyến bay: <b>mã chuyến bay</b> <br>
                                        Khởi hành: <b>Thứ Bảy 24 Tháng Mười Hai 2022, 10:35pm, Thành phố Hồ Chí Minh</b> <br>
                                        Đến: <b>Chủ Nhật 25 Tháng Mười Hai 2022, 11:00am, Đà Nẵng </b> <br>
                                        Hạng: <b>Phổ thông</b> <br>     
                                        Thời gian: <b>1h30m</b>  <br>    
                                        Máy bay: <b>mã máy bay</b>  <br>   
                                        Số ghê: <b>100 (còn 15)</b>  <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Chuyến bay về</h5>
                    <span><span class="fa fa-plane"></span>  <b>Tp. Hồ Chí Minh đến Đà Nẵng </b> –Thứ Bảy 24 Tháng Mười Hai 2022</span>
                </div>
            </div>
            <div class="col-lg-4 mt-3"></div>
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="flight-route">
                                    <div style="margin-right: 50px;">
                                        <span style="font-weight: bold;">05:20</span><br>
                                        <span>SGN</span>
                                    </div> 
                                    <div>
                                        <span class="fa">&#xf041;</span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="fa fa-plane"></span><br>
                                        <span style="margin-left: 30px;">1h30m</span>
                                    </div>
                                    <div style="margin-left: 50px;">
                                        <span style="font-weight: bold;">17:20</span><br>
                                        <span>DAD</span>
                                    </div> 
                                </div>
                            </li>
                            <li class="list-group-item">
                                <span>Phổ thông</span>
                                <span style="font-weight: bold;margin-left: 75px;">1.120.000 VNĐ</span>
                                <button class="btn-seedel-ticket" data-bs-toggle="modal" data-bs-target="#seedetail">Xem chi tiết</button>
                                <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                            </li>
                        </ul>
                    </div>
                </div>
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
          <a class="text-white" href="home.html">SkyAirlines.com.vn</a>
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
</html>