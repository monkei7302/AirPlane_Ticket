<?php 
    require 'connect.php';
    session_start();

    // Hàm tạo ID tự động
    function createID($old_id){
        $char = substr($old_id, 0, 2);
        $num_id = (int) substr($old_id,2) + 1;
        $new_id = '';
        for($i = 0; $i < (4-strlen((string) $num_id)); $i++){
            $new_id = $new_id . "0";
        }
        return $char . $new_id . $num_id;

    }

    //Xử lí sự kiện khi người dùng thanh toán 
    //Trường hợp đã đăng nhập
    if(isset($_SESSION['login'])){
       if(isset($_POST['paid'])){
        // Lấy thông tin vé cũ để tạo id vé mới
            $check = mysqli_query($con,"SELECT * FROM `ticket_info`");
            if(mysqli_num_rows($check) != 0){
                $recent_id = mysqli_query($con,"SELECT * FROM `ticket_info` ORDER BY `ticket_id` DESC LIMIT 1");
                while($row = mysqli_fetch_assoc($recent_id)){
                    $last = $row["ticket_id"];
                }
                $id = createID($last);
            }
            else{
                $id = createID("TK0000");
            }

            // Lấy thông tin người dùng
            $username = $_SESSION['username'];
            $sql_pro = mysqli_query($con,"SELECT * FROM `passenger_profile` WHERE `passenger_username` LIKE '%$username%'");
            while($row_pro = $sql_pro->fetch_array(MYSQLI_ASSOC)){
                $pro_id = $row_pro['profile_id'];
            }

            // Lấy danh sách ghế mà người dùng vừa đặt chỗ
            $flight_id = $_SESSION['flight_id'];
            $seat_id = explode(" ",$_POST['seat_id']);
            $_SESSION['num_seat'] = $_POST['seat_id'];
            $count_seat = str_word_count($_POST['seat_id']);

            for($x = 0; $x < $count_seat; $x++){
                $sql_seat = "INSERT INTO `seat` VALUES(?,?)";
                $stm = $con -> prepare($sql_seat);
                $stm -> bind_param("ss",$seat_id[$x],$flight_id);
                if(!$stm->execute()){
                    die($stm->error);
                }
            }

            

            $total = $_POST['total'];
            
            //Lưu thông tin vé vừa đặt
            $sql = "INSERT INTO `ticket_info` VALUES(?,?,?,?)";
            $stm = $con -> prepare($sql);
            $stm -> bind_param("sssi",$id,$pro_id,$flight_id,$total);
            if(!$stm->execute()){
                die($stm->error);
            }
            else{
                header("location: historyLogin.php");
            }
       }
    }
    //Trường hợp chưa đăng nhập
    else{
        if(isset($_POST['paid'])){
            //Lấy thông tin vé cũ để tạo id vé mới
            $check = mysqli_query($con,"SELECT * FROM `ticket_info`");
            if(mysqli_num_rows($check) != 0){
                $recent_id = mysqli_query($con,"SELECT * FROM `ticket_info` ORDER BY `ticket_id` DESC LIMIT 1");
                while($row = mysqli_fetch_assoc($recent_id)){
                    $last = $row["ticket_id"];
                }
                $id_ticket = createID($last);
            }
            else{
                $id_ticket = createID("TK0000");
            }
            //Lấy thông tin profile cũ để tạo id profile mới
            $check_pro = mysqli_query($con,"SELECT * FROM `passenger_profile`");
            if(mysqli_num_rows($check_pro) != 0){
                $recent_id = mysqli_query($con,"SELECT * FROM `passenger_profile` ORDER BY `profile_id` DESC LIMIT 1");
                while($row = mysqli_fetch_assoc($recent_id)){
                    $last = $row["profile_id"];
                }
                $id_pro = createID($last);
            }
            else{
                $id_pro = createID("PS0000");
            }
            // Tạo profile mới cho user nếu chưa đăng nhập
            $username = "";
            $password = "";
            $address = "";  
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phonenumber'];

            $flight_id = $_SESSION['flight_id'];
            $seat_id = explode(" ",$_POST['seat_id']);
            $_SESSION['num_seat'] = $_POST['seat_id'];
            $count_seat = str_word_count($_POST['seat_id']);

            for($x = 0; $x < $count_seat; $x++){
                $sql_seat = "INSERT INTO `seat` VALUES(?,?)";
                $stm = $con -> prepare($sql_seat);
                $stm -> bind_param("ss",$seat_id[$x],$flight_id);
                if(!$stm->execute()){
                    die($stm->error);
                }
            }


            $sql_pro = "INSERT INTO `passenger_profile` VALUES(?,?,?,?,?,?,?,?,?)";
            $stm = $con -> prepare($sql_pro);
            $stm -> bind_param("sssssssss",$id_pro,$username,$password,$first_name,$last_name,$gender,$address,$phone,$email);
            if(!$stm->execute()){
                die($stm->error);
            }


            $total = $_POST['total'];   
            // Lưu thông tin vé vừa đặt
            $sql_ticket = "INSERT INTO `ticket_info` VALUES(?,?,?,?)";
            $stm = $con -> prepare($sql_ticket);
            $stm -> bind_param("sssi",$id_ticket,$id_pro,$flight_id,$total);
            if(!$stm->execute()){
                die($stm->error);
            }
            else{
                header("location:history.php?id_ticket=" . urlencode($id_ticket));
            }
        }
        
    }
?>