<?php
    //Tạo biến $con để kết nối dữ liệu đến database 
    $con = new mysqli("localhost","root","","air_plane");
    if($con -> connect_error){
        die("Connection failed" .$con->connect_error);
    }

?>