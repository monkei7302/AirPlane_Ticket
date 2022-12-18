<
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inforbooking.css">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
              <a class="nav-link active" href="signedluggage.php" style = "background-color: #6db7cb; border: 1px solid #6db7cb; border-radius: 25px;">Hành lý</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="planeSeating.html" style = "color: white; background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chỗ ngồi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inforbooking.html" style = "color: white; background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Điền thông tin và thanh toán</a>
            </li>
        </ul> 
        <h1 class = "text-center mt-3">Điền thông tin và thanh toán</h1>>
    </div>
    <form>
        <div class="container">
            <div class="row mt-3">
                <h4>Người lớn 1</h4>
                <div class="col-lg-6 mt-3">
                    Nhập họ và tên đệm<br>
                    <input type="text" class="input-control" placeholder="Nhập họ và tên đệm" name="firstname"/>
                </div>
                <div class="col-lg-6 mt-3">
                    Nhập Tên<br>
                    <input type="text" class="input-control" placeholder="Nhập tên" name="lastname"/>
                </div>
            </div>
            <div style="margin-top:15px">
                Chọn giới tính <br>
                <select id="gender" name="gender">
                    <option></option>
                    <option value="female">Nữ</option>
                    <option value="male">Nam</option>
                </select>
            </div>
            <div style="margin-top:15px">
                Nhập email<br>
                <input type="email" class="input-control" placeholder="Nhập email" name="email"/>
            </div>
            <div style="margin-top:15px">
                Nhập số điện thoại<br>
                <input type="number" class="input-control" placeholder="Nhập số điện thoại" name="phonenumber"/>
            </div>
            <div style="margin-top:15px">
                <input type="checkbox" class="check-btn" name="accept" id="accept"><span style="font-size: 16px; margin-left:10px;">Tôi chọn thông tin này làm thông tin liên hệ</span></input><br>
            </div>

            <div class="row mt-6">
                <h4>Thông tin liên hệ</h4>
                <div class="col-lg-6 mt-3">
                    Nhập họ và tên đệm<br>
                    <input type="text" class="input-control" placeholder="Nhập họ và tên đệm" name="firstname"/>
                </div>
                <div class="col-lg-6 mt-3">
                    Nhập Tên<br>
                    <input type="text" class="input-control" placeholder="Nhập tên" name="lastname"/>
                </div>
            </div>
            <div style="margin-top:15px">
                Nhập email<br>
                <input type="email" class="input-control" placeholder="Nhập email" name="email"/>
            </div>
            <div style="margin-top:15px">
                Nhập số điện thoại<br>
                <input type="number" class="input-control" placeholder="Nhập số điện thoại" name="phonenumber"/>
            </div>
            <div class="card" style="margin-top: 100px;">
                <div class="card-body">
                    <a href="#" class="btn-continue" data-bs-toggle="modal" data-bs-target="#payment">Thanh toán</a>
                    <span class="price">1.150.000 VNĐ</span>
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
                    <form>
                        <div class="modal-body">
                            <h5 class="modal-title" style="margin-bottom: 30px;text-align: center;">Chuyến bay từ Tp. Hồ Chí Minh đến Đà Nẵng –Thứ Bảy 24 Tháng Mười Hai 2022</h5>
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;font-size: 18px;">Giá vé</span><span style="float: right;font-size: 18px;">1.150.000 VNĐ</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <span style="font-weight: bold;font-size: 18px;">Hành lý ký gửi</span><span style="float: right;font-size: 18px;">600.000 VNĐ</span>
                            </div>
                            <div>
                                <span style="font-weight: bold;font-size: 18px;">Chỗ ngồi</span><span style="float: right;font-size: 18px;">700.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <a href="#" type="button" class="btn add-color" data-bs-toggle="modal" data-bs-target="#success">Thanh toán</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <div class="modal" id="success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p style="text-align: center;font-size: 24px;font-weight: bold;">Thanh toán thành công</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <a href="home.html" type="button" class="btn btn-success">OK</a>
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
          <a class="text-white" href="home.html">SkyAirlines.com.vn</a>
        </div>
    </footer>  
</body>
</html>