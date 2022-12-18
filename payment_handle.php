<?php 
    require 'connect.php';
    session_start();

    function createID($old_id){
        $char = substr($old_id, 0, 2);
        $num_id = (int) substr($old_id,2) + 1;
        $new_id = '';
        for($i = 0; $i < (4-strlen((string) $num_id)); $i++){
            $new_id = $new_id . "0";
        }
        return $char . $new_id . $num_id;

    }

    if(isset($_POST['login'])){
       if(isset($_POST['paid'])){
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

            $username = $_SESSION['username'];
            $sql_pro = mysqli_query($con,"SELECT * FROM `passenger_profile` WHERE `passenger_username` = '%$username%'");
            while($row_pro = $sql_pro->fetch_array(MYSQLI_ASSOC)){
                $pro_id = $row_pro['profile_id'];
            }

            $flight_id = $_SESSION['flight_id'];
            $status = "Paid";
            

            $sql = "INSERT INTO `ticket_info` VALUES(?,?,?,?)";
            $stm = $con -> prepare($sql);
            $stm -> bind_param("ssss",$id,$pro_id,$flight_id,$status);
            if(!$stm->execute()){
                die($stm->error);
            }
            else{
                header("location: historyLogin.php");
            }
       }
    }
    else{
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

        $username = "";
        $password = "";
        $address = "";  
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phonenumber'];


        $sql_pro = "INSERT INTO `passenger_profile` VALUES(?,?,?,?,?,?,?,?,?)";
        $stm = $con -> prepare($sql_pro);
        $stm -> bind_param("sssssssss",$id_pro,$username,$password,$first_name,$last_name,$gender,$address,$phone,$email);
        if(!$stm->execute()){
            die($stm->error);
        }

        $flight_id = $_SESSION['flight_id'];
        $status = "Paid";
        

        $sql = "INSERT INTO `ticket_info` VALUES(?,?,?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ssss",$id_ticket,$id_pro,$flight_id,$status);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: history.php");
        }
    }
?>