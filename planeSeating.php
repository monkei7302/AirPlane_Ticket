<?php
  session_start();
  if(isset($_POST['choose_luggage'])){
    $price = $_POST['price'];
    $flight_id = $_POST['flight_id'];
    $type_luggage = $_POST['luggage'];

    $_SESSION['price'] = $price;
    $_SESSION['flight_id'] = $flight_id;
    $_SESSION['type_luggage'] = $type_luggage;

    if($type_luggage == 0){
      $_SESSION['price'] = $_SESSION['price'];
    }
    else if($type_luggage == 20){
      $_SESSION['price'] = floatval($_SESSION['price']) + 200000;
    }
    else if($type_luggage == 25){
      $_SESSION['price'] = floatval($_SESSION['price']) + 250000;
    }
    else if($type_luggage == 30){
      $_SESSION['price'] = floatval($_SESSION['price']) + 300000;
    }
    else if($type_luggage == 35){
      $_SESSION['price'] = floatval($_SESSION['price']) + 350000;
    }
    else if($type_luggage == 40){
      $_SESSION['price'] = floatval($_SESSION['price']) + 400000;
    }
  }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/signedluggage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        .note {
            width:20px;
            height:20px;
            border:1px solid black;
        }
    .plane {
        width: 400px;
        border: 1px solid black;
        margin-left: 100px;
    }
    .exit {
        position: relative;
        height: 50px;
    }
    .exit:before, .exit:after {
        content: "EXIT";
        padding: 0px 2px;
        position: absolute;
        background: green;
        color: white;
        margin-top: 20px;
    }
    .exit:before {
        left: 0;
    }
    .exit:after {
        right: 0;
    }
    ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .seats {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
    }
    .seat {
        display: flex;
        flex: 0 0 14.2857142857%;
        padding: 5px;
        position: relative;
    }
    .seat:nth-child(3) {
        margin-right: 55px;
    }
    .seat input[type=radio] {
        position: absolute;
        opacity: 0;
    }
    .seat input[type=radio]:checked + label {
        background: #bada55;
    }
    .seat input[type=radio]:disabled + label {
        background: #ddd;
        text-indent: -9999px;
        overflow: hidden;
    }
    .seat input[type=radio]:disabled + label:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
    }
    .seat label {
        color: white;
        position: relative;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.5rem;
        padding: 4px 0;
        background: #f6616d;

    }
    .seat label:hover {
        cursor: pointer;
        box-shadow: 0 0 0px 2px #6db7cb;
    }
    .typeSeat1 label {
        background-color: #6db7cb;
    }
    .typeSeat2 label {
        background-color: #ea7ec9;
    }
    .card{
      font-size: 18px; 
      font-weight: bold; 
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
                      <a class="nav-link" aria-current="page" href="home.html"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item aria-current">
                      <a class="nav-link active" href="search_flight.html"> Chuyến bay</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="history.html">Tra cứu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login.html"><i class="fa fa-user-o" aria-hidden="true"></i> Đăng nhập
                      </a>
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
                  <a class="nav-link" href="planeSeating.html" style = "color: white; background-color: #6db7cb;border: 1px solid #6db7cb; border-radius: 25px;">Chỗ ngồi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style = "border: 1px solid #6db7cb; border-radius: 25px;">Điền thông tin và thanh toán</a>
                </li>
            </ul> 
            <h1 class = "text-center mt-3 mb-3">Chọn chỗ ngồi</h1>>
        </div>
        <div class  ="container mx-auto">   
          <input id = "price" type="hidden" name="price" value="<?php echo $_SESSION['price']?>">
          <input id = "flight_id" type="hidden" name="flight_id" value="<?php echo $flight_id?>">
            <div class = "row">
                <div class = "card col-lg-3" style = "height: fit-content;">
                    <div class = "card-body">
                        <div class = "note" style = "background-color: #6db7cb;"></div>
                        <div class = "card-text">Chỗ ngồi rộng chân - 300.000đ</div>
                        <br>
                        <div class = "note" style = "background-color: #ea7ec9"></div>
                        <div class = "card-text">Chỗ ngồi phía trước - 150.000đ</div>
                        <br>
                        <div class = "note" style = "background-color: #f6616d"></div>
                        <div class = "card-text">Chỗ ngồi tiêu chuẩn - 80.000đ</div>
                    </div>
                </div>
                <div class="plane card col-lg-3">
                
                    <div class="exit exit--front"></div>
                   
                    <ol class="cabin ">
                      <li class="row row--1">
                        <ol class="seats typeSeat1" type="A">
                          <li class="seat">
                            <input cate="1" type="radio" name="seat" id="1A" />
                            <label for="1A">1A</label>
                          </li>
                          <li class="seat">
                            <input cate="1" type="radio" name="seat" id="1B" />
                            <label for="1B">1B</label>
                          </li>
                          <li class="seat">
                            <input cate="1" type="radio" name="seat" id="1C" />
                            <label for="1C">1C</label>
                          </li>
                          <li class="seat">
                            <input cate="1" type="radio" name="seat" id="1D" />
                            <label for="1D">1D</label>
                          </li>
                          <li class="seat">
                            <input cate="1" type="radio" name="seat"  id="1E" />
                            <label for="1E">1E</label>
                          </li>
                          <li class="seat">
                            <input cate="1" type="radio" name="seat" id="1F" />
                            <label for="1F">1F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--2 ">
                        <ol class="seats typeSeat2" type="A">
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2A" />
                            <label for="2A">2A</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2B" />
                            <label for="2B">2B</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2C" />
                            <label for="2C">2C</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2D" />
                            <label for="2D">2D</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2E" />
                            <label for="2E">2E</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="2F" />
                            <label for="2F">2F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--3">
                        <ol class="seats typeSeat2" type="A">
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3A" />
                            <label for="3A">3A</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3B" />
                            <label for="3B">3B</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3C" />
                            <label for="3C">3C</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3D" />
                            <label for="3D">3D</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3E" />
                            <label for="3E">3E</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="3F" />
                            <label for="3F">3F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--4">
                        <ol class="seats typeSeat2" type="A">
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4A" />
                            <label for="4A">4A</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4B" />
                            <label for="4B">4B</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4C" />
                            <label for="4C">4C</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4D" />
                            <label for="4D">4D</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4E" />
                            <label for="4E">4E</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="4F" />
                            <label for="4F">4F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--5">
                        <ol class="seats typeSeat2" type="A">
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5A" />
                            <label for="5A">5A</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5B" />
                            <label for="5B">5B</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5C" />
                            <label for="5C">5C</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5D" />
                            <label for="5D">5D</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5E" />
                            <label for="5E">5E</label>
                          </li>
                          <li class="seat">
                            <input cate="2" type="radio" name="seat" id="5F" />
                            <label for="5F">5F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--6">
                        <ol class="seats" type="A">
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6A" />
                            <label for="6A">6A</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6B" />
                            <label for="6B">6B</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6C" />
                            <label for="6C">6C</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6D" />
                            <label for="6D">6D</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6E" />
                            <label for="6E">6E</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="6F" />
                            <label for="6F">6F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--7">
                        <ol class="seats" type="A">
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7A" />
                            <label for="7A">7A</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7B" />
                            <label for="7B">7B</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7C" />
                            <label for="7C">7C</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7D" />
                            <label for="7D">7D</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7E" />
                            <label for="7E">7E</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="7F" />
                            <label for="7F">7F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--8">
                        <ol class="seats" type="A">
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8A" />
                            <label for="8A">8A</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8B" />
                            <label for="8B">8B</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8C" />
                            <label for="8C">8C</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8D" />
                            <label for="8D">8D</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8E" />
                            <label for="8E">8E</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="8F" />
                            <label for="8F">8F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--9">
                        <ol class="seats" type="A">
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9A" />
                            <label for="9A">9A</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9B" />
                            <label for="9B">9B</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9C" />
                            <label for="9C">9C</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9D" />
                            <label for="9D">9D</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9E" />
                            <label for="9E">9E</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="9F" />
                            <label for="9F">9F</label>
                          </li>
                        </ol>
                      </li>
                      <li class="row row--10">
                        <ol class="seats" type="A">
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10A" required/>
                            <label for="10A">10A</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10B" />
                            <label for="10B">10B</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10C" />
                            <label for="10C">10C</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10D" />
                            <label for="10D">10D</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10E" />
                            <label for="10E">10E</label>
                          </li>
                          <li class="seat">
                            <input cate="3"  type="radio" name="seat" id="10F" />
                            <label for="10F">10F</label>
                          </li>
                        </ol>
                      </li>
                    </ol>
                    <div class="exit exit--back"></div>
                
                </div>
                
            </div> 
        </div>
        <form action="inforbooking.php" method="post">
          <input id="seat_price" type="hidden" name="seat_price">
          <input id="seat_id" type="hidden" name="seat_id">
        <div class="card container" style="margin-top: 180px;">
            <div class="card-body">
                <button type="submit" value="seat" id="btn-continue" class="btn-continue" name="plane_seating">Tiếp tục</button>
                <span class="price">Giá tiền: <?php if(isset($price)) echo $price;?> VNĐ</span>
            </div>
        </div>
        </form>
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
    <script src="script/seat_script.js"></script>
</html>