<?php
    //Kết nối dữ liệu database
    require 'connect.php';
    //Kích hoạt các biến giá trị session
    session_start();
    
    //Thao tác đăng nhập
    if (isset($_POST['login'])) {
        //Lưu username và password của người dùng khi nhập vào
        $check_user = $_POST['username'];
        $check_password = $_POST['password'];

        //Kiểm tra và tránh lỗi bảo mật của mysqli
        $check_user = mysqli_real_escape_string($con, $check_user);
        $check_password = mysqli_real_escape_string($con, $check_password);

        //Kiểm tra dữ liệu user có tồn tại hay không
        $sql_login = "SELECT * FROM `passenger_profile` WHERE `passenger_username` LIKE '$check_user' AND `password` LIKE '$check_password'";
        $sql_run = mysqli_query($con, $sql_login);
        $num_user = mysqli_num_rows($sql_run);

        //Kiểm tra dữ liệu manager có tồn tại hay không
        $sql_login_manager = "SELECT * FROM `manager_profile` WHERE `manager_username` LIKE '$check_user' AND `password` LIKE '$check_password'";
        $sql_run_manager = mysqli_query($con, $sql_login_manager);
        $num_manager = mysqli_num_rows($sql_run_manager);

        /*Đoạn mã đăng nhập thành công sẽ lưu biến session login, thất bại sẽ gửi lỗi về trang login để thông báo lỗi không
        tìm thấy tài khoản*/
        if($num_user == 1){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $check_user;
            header('location: home.php');
        }
        else if($num_manager == 1){
            $_SESSION['login'] = true;
            header('location: admin.php');
        }
        else{
            header("location:login.php?error=" . urlencode("Unknown User"));
        }
    }
?>