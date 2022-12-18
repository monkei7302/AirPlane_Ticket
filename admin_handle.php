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


    if(isset($_POST['delete_user'])){
        $id_pro = $_POST['id'];
        $sql_user = mysqli_query($con,"DELETE FROM `passenger_profile` WHERE `profile_id` = '$id_pro'");
        
        if($sql_user){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
    else if(isset($_POST['delete_hl'])){
        $id_hl = $_POST['id_hl'];
        $sql_hl = mysqli_query($con,"DELETE FROM `hight_light` WHERE `id_hight` = '$id_hl'");
        
        if($sql_hl){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
    else if(isset($_POST['add_hl'])){
        $check = mysqli_query($con,"SELECT * FROM `hight_light`");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `hight_light` ORDER BY `id_hight` DESC LIMIT 1");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["id_hight"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("HL0000");
        }

        $name_hl = $_POST['flight_name'];
        $image_hl = $_POST['image'];
        $date_hl = str_replace('-','/',date("d-m-Y", strtotime($_POST['date']))) ;
        $des_hl = $_POST['description'];
        $price_hl = $_POST['pricehight'];

        $sql = "INSERT INTO `hight_light` VALUES(?,?,?,?,?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ssssss",$id,$name_hl,$image_hl,$date_hl,$des_hl,$price_hl);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: admin.php");
        }
    }
    else if(isset($_POST['update_hl'])){
        $id_hl = $_POST['id_hl'];
        $name_hl = $_POST['flight_name'];
        $image_hl = $_POST['image'];
        $date_hl = $_POST['date'] ;
        $des_hl = $_POST['description'];
        $price_hl = $_POST['pricehight'];

        $sql = "UPDATE `hight_light` SET `flight_name` = '$name_hl', `image` = '$image_hl', `date` = '$date_hl', `description` = '$des_hl', `price` = '$price_hl' WHERE `id_hight` = '$id_hl'";
        $sql_update_hl = mysqli_query($con,$sql);
        header("location: admin.php");
    }
    else if(isset($_POST['delete_start'])){
        $id_start = $_POST['id_start'];
        $sql_start = mysqli_query($con,"DELETE FROM `start_place` WHERE `id_start` = '$id_start'");
        
        if($sql_start){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
    else if(isset($_POST['add_start'])){
        $check = mysqli_query($con,"SELECT * FROM `start_place`");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `start_place` ORDER BY `id_start` DESC LIMIT 1");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["id_start"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("ST0000");
        }

        $name_start = $_POST['start_name'];
        

        $sql = "INSERT INTO `start_place` VALUES(?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ss",$id,$name_start);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: admin.php");
        }
    }
    else if(isset($_POST['add_des'])){
        $check = mysqli_query($con,"SELECT * FROM `destination`");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `destination` ORDER BY `id_des` DESC LIMIT 1");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["id_des"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("DS0000");
        }

        $name_des = $_POST['des_name'];
        

        $sql = "INSERT INTO `destination` VALUES(?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ss",$id,$name_des);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: admin.php");
        }
    }
    else if(isset($_POST['delete_des'])){
        $id_des = $_POST['id_des'];
        $sql_des = mysqli_query($con,"DELETE FROM `destination` WHERE `id_des` = '$id_des'");
        
        if($sql_des){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
    else if(isset($_POST['delete_history'])){
        $id_his_pro = $_POST['id_his_pro'];
        $id_his_flight = $_POST['id_his_flight'];
        $id_his_ticket = $_POST['id_his_ticket'];

        $sql_history = mysqli_query($con,"DELETE FROM `history` WHERE `profile_id` = '$id_his_pro' AND `ticket_id` = '$id_his_ticket' AND `flight_id` = '$id_his_flight'");
        
        if($sql_history){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
?>