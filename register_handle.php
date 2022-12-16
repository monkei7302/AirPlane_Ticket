<?php
    require 'connect.php';

    function createID($old_id){
        $char = substr($old_id, 0, 2);
        $num_id = (int) substr($old_id,2) + 1;
        $new_id = '';
        for($i = 0; $i < (4-strlen((string) $num_id)); $i++){
            $new_id = $new_id . "0";
        }
        return $char . $new_id . $num_id;

    }
    
    if (isset($_POST['register'])) {

        $check = mysqli_query($con,"SELECT * FROM `passenger_profile`");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `passenger_profile` ORDER BY `profile_id` DESC LIMIT 1");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["profile_id"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("PS0000");
        }

        $add_user = $_POST['username'];
        $add_password = $_POST['password'];
        $add_first_name = $_POST['firstname'];
        $add_last_name = $_POST['lastname'];
        $add_gender = $_POST['gender'];
        $add_address = $_POST['address'];
        $add_phone = $_POST['phonenumber'];
        $add_email = $_POST['email'];

        $check_user = mysqli_query($con,"SELECT * FROM `passenger_profile` WHERE `passenger_username` = '$add_user'");
        if(mysqli_num_rows($check_user)>0){
            header("location: register.php?exist=" . urlencode("Exist"));
        }
        else{
            $sql = "INSERT INTO `passenger_profile` VALUES(?,?,?,?,?,?,?,?,?)";
            $stm = $con -> prepare($sql);
            $stm -> bind_param("sssssssss",$id,$add_user,$add_password,$add_first_name,$add_last_name,$add_gender,$add_address,$add_phone,$add_email);
            if(!$stm->execute()){
                die($stm->error);
            }
            else{
                header("location:login.php?signup=" . urlencode("Success"));
            }
        }
    }
?>