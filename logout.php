<?php
    //Kích hoạt các biến session
    session_start();

    //Vô hiệu hóa và xóa tất cả biến session
    session_destroy();

    //Chuyển hướng đến trang login khi đăng xuất
    header('Location: login.php');
    exit();
?>
