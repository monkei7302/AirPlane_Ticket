<?php
  require 'connect.php';
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
</head>
<style>
    html {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url("css/imageCSS/bg_login.png");
        height: auto; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
  }
    body{
        background-color: transparent;
    }
    h2 {
        text-align: center; 
        color: white;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 10px;
    }
    #cre {
        margin-top: 20px;
        margin-bottom: 20px;
        font-style: italic;
        text-align: center;
        color: rgb(185, 189, 189);
    }
    input{
      width: 100%;
    }
    .card {
        width: 40%;
        background-color: white;
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
    <div class = "container">
        <h2>Chỉnh sửa thông tin tài khoản</h2>
        <div class = "row">
            <div class = "card mx-auto">
                <div class = "card-img-top text-center mt-2">
                    <img src="img/user.png" alt="user" width="100" height="100">
                </div>
                <div class="card-body mx-auto">
                <?php
                    $check_user = $_SESSION['username'];
                    $sql_pro = "SELECT * FROM `passenger_profile` WHERE `passenger_username` LIKE '$check_user'";
                    $sql_pro_run = mysqli_query($con,$sql_pro);
                    while($row = $sql_pro_run->fetch_array(MYSQLI_ASSOC)){
                      $username = $row['passenger_username'];
                      $id = $row['profile_id'];
                      $first_name = $row['first_name'];
                      $last_name = $row['last_name'];
                      $address = $row['address'];
                      $phone = $row['phone'];
                      $email = $row['email'];
                    }
                    ?>
                    <p style = "text-align: center; margin-top: -50px;"><?php echo $username;?></p>
                    <form action="profile_handle.php" method="post">
                      <input type="hidden" name="id_user" id="username" value="<?php echo $id;?>">
                      <b>Tên tài khoản: </b>
                      <br>
                      <input type="text" name="username" id="username" value="<?php echo $username;?>">
                      <br>
                      <b>Họ: </b>
                      <input type="text" name="firstname" id="firstname" value="<?php echo $first_name;?>">
                      <br>
                      <b>Tên: </b>
                      <input type="text" name="lastname" id="lastname" value="<?php echo $last_name;?>">
                      <br>
                      <b>Địa chỉ: </b>
                      <input type="text" name="address" id="address" value="<?php echo $address;?>">
                      <b>Số điện thoại: </b>
                      <input type="text" name="phone" id="phone" value="<?php echo $phone;?>">
                      <b>Email liên hệ: </b>
                      <input type="text" name="email" id="email" value="<?php echo $email;?>">
                      <br>
                      <button type="submit" style = "margin-left: 60px;" class = " mt-3 btn btn-success" name="update_profile" value="update" id="update">Lưu thông tin</button> <a href="change_password.php" style = "margin-left: 35px;" class = " mt-3 btn btn-danger" >Đổi mật khẩu</a>
                    </form>
                    
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#update').click(function(){
            alert("Cập nhật thông tin thành công! Vui lòng đăng nhập lại để hiển thị thông tin đã cập nhật!");
        })
    });
</script>
</html>
