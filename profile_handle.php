<?php
    require 'connect.php';
    session_start();
    
    if(isset($_POST['update_profile'])){
        $id = $_POST['id_user'];
        $username = $_POST['username'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $sql = "UPDATE `passenger_profile` SET `passenger_username` = '$username', `first_name` = '$first_name', `last_name` = '$last_name', `address` = '$address', `phone` = '$phone', `email` = '$email' WHERE `profile_id` LIKE '$id'";
        $sql_run = mysqli_query($con,$sql);

        header("Location: logout.php");
    }
    else if(isset($_POST['update_password'])){
        $id = $_POST['id_user'];
        $old_pass = $_POST['old_password'];
        $new_pass = $_POST['new_password'];
        if($old_pass == $new_pass){
            $sql = "UPDATE `passenger_profile` SET `password` = '$new_pass' WHERE `profile_id` LIKE '$id'";
            $sql_run = mysqli_query($con,$sql);

            header("location:change_password.php?success=" . urlencode("Success"));
        }
        else{
            header("location:change_password.php?error=" . urlencode("Wrong password"));
        }

    }
?>