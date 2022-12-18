<?php
    require 'api/connect.php';

    $message = '';
    $flag = '';
    if(isset($_GET['error'])) {
      $flag = false;
      $message = '! User not found !';
    }
    else if(isset($_GET['signup'])){
      $flag = true;
      $message = '~ Sign up success ~';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login_register_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body{
        background-color: transparent;
    }
</style>
<body>
    <div class="col">
        <div class="form" style="margin-top:180px;">
            <form action="login_handle.php" method="post">
              <p class="title">ĐĂNG NHẬP</p>
              <input type="text" class="input-control" placeholder="Tên đăng nhập" name="username" required/>
              <input type="password" class="input-control" placeholder="Mật khẩu" name="password" required/>
              <?php
                    if($flag == true){
                        echo '<p style = "color: #CCFF90; font-weight: bold; margin-top:-5px;">'.$message.'</p>';
                    }
                    else{
                        echo '<p style = "color: #FF8A80; font-weight: bold; margin-top:-5px;">'.$message.'</p>';
                    }
                ?>
              <button name="login" value="login">Đăng nhập</button>
              <p class="message">Quý khách chưa có tài khoản? <a href="register.php" style="font-weight: bold;">Tạo tài khoản</a></p>
            </form>
        </div>
    </div>
</body>
</html>