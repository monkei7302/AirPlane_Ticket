<?php
    require 'api/connect.php';

    $message = '';
    if(isset($_GET['exist'])) {
      $message = '! Username is already existed !';
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/login_register_style.css">
<style>
</style>
</head>
<body>
    <div class="form" style="margin-top:35px;">
        <form action="register_handle.php" method="post">
            <p class="title">ĐĂNG KÝ TÀI KHOẢN</p>
            <?php
                echo '<p style = "color: #FF9E80; font-weight: bold; margin-top:-5px;">'.$message.'</p>';
            ?>
            <input type="text" class="input-control" placeholder="Nhập tên đăng nhập" name="username" required/>
            <input type="password" class="input-control" placeholder="Nhập mật khẩu" name="password" required/>
            <input type="text" class="input-control" placeholder="Nhập họ của bạn" name="firstname" required/>
            <input type="text" class="input-control" placeholder="Nhập tên của bạn" name="lastname" required/>
            <div class="radio-btn">
                <input type="radio"  name="gender" value="female"><span style="margin-right: 80px;" class="text-radio" required>Nữ</span></input>
                <input type="radio"  name="gender" value="male"><span class="text-radio" required>Nam</span></input>
            </div>
            <input type="text" class="input-control" placeholder="Nhập địa chỉ của bạn" name="address" required/>
            <input type="text" class="input-control" placeholder="Nhập số điện thoại của bạn" name="phonenumber" required/>
            <input type="email" class="input-control" placeholder="Nhập email của bạn" name="email" required/>
            <button name="register" value="register">Đăng ký</button>
            <p class="message">Đã có tài khoản rồi? <a href="login.php" style="font-weight: bold;">Đăng nhập</a></p>
        </form>
    </div>
    
</body>
</html>