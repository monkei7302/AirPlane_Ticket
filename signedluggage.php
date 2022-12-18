<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signedluggage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>   
</head>
<body>
    <h1 style="text-align:center">Hành lý</h1>
    <div style="margin-left: 20px;">
        <h2 onclick="check()">Chuyến bay đi(đến)</h2>
        <span><span class="fa fa-plane"></span>  <b>Tp. Hồ Chí Minh đến Đà Nẵng </b> –Thứ Bảy 24 Tháng Mười Hai 2022</span><br><br>
        <span style="font-weight: bold;font-size: 24px;">Hành lý ký gửi</span><br>
        <span>Quý khách làm thủ tục cho hành lý ký gửi trước khi đến cổng và sẽ không thể mang hành lý ký gửi lên máy bay.</span><br>
    </div>
    <div class="container mt-3">
        <div class="row">
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="0" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/no_luggage.png"><br>
                                <span class="weight-luggage">0 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="20" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/icon_20kg_luggage.png"><br>
                                <span class="weight-luggage">20 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="25" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/icon_25kg_luggage.png"><br>
                                <span class="weight-luggage">25 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="30" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/icon_30kg_luggage.png"><br>
                                <span class="weight-luggage">30 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="35" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/icon_35-40kg_luggage.png"><br>
                                <span class="weight-luggage">35 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label>
                        <input type="radio" id="luggage" name="luggage" value="40" class="card-input-element" />
                        <div class="card card-default card-input">
                            <div class="card-body" style="text-align: center;">
                                <img src="imageHTML/icon_35-40kg_luggage.png"><br>
                                <span class="weight-luggage">40 kg</span><br>
                                <span class="price-luggage">715.000 VNĐ</span>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="card" style="margin-top: 180px;">
                    <div class="card-body">
                        <a href="#" class="btn-continue">Tiếp tục</a>
                        <span class="price">1.150.000 VNĐ</span>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>