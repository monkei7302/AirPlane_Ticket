<?php
    //Kết nối dữ liệu database
    require 'connect.php';

    //Hàm khởi tạo giá trị id tự động
    function createID($old_id){
        $char = substr($old_id, 0, 2);
        $num_id = (int) substr($old_id,2) + 1;
        $new_id = '';
        for($i = 0; $i < (4-strlen((string) $num_id)); $i++){
            $new_id = $new_id . "0";
        }
        return $char . $new_id . $num_id;

    }

    //Quản lý User (Xóa User)
    //Đoạn mã xóa user khi admin chọn xóa user
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
    //Quản lý chuyến bay nổi bật (Thêm, xóa, sửa)
    //Đoạn mã xóa những chuyến bay nổi bật khi admin chọn xóa chuyến bay nổi bật
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
    //Đoạn mã thêm chuyến bay nổi bật khi admin chọn thêm và điền đầy đủ thông tin chuyến bay nổi bật
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
    //Đoạn mã cập nhật chuyến bay nổi bật khi admin chọn cập nhật và điền đầy đủ thông tin cập nhật chuyến bay nổi bật
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
    //Quản lý địa điểm bắt đầu(thêm, xóa)
    //Đoạn mã xóa địa điểm bắt đầu khi admin chọn xóa địa điểm bắt đầu
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
    //Đoạn mã thêm địa điểm bắt đầu khi admin chọn thêm và điền đầy đủ thông tin địa điểm bắt đầu
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
    //Quản lý địa điểm đến (thêm, xóa)
    //Đoạn mã thêm địa điểm đến khi admin chọn thêm và điền đầy đủ thông tin địa điểm đến
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
    //Đoạn mã xóa địa điểm đến khi admin chọn xóa địa điểm đến
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
    //Quản lý lịch sử đặt vé của khách hàng (Xóa)
    //Đoạn mã xóa lịch sử đặt vé của khách hàng
    else if(isset($_POST['delete_history'])){
        $id_his_pro = $_POST['id_his_pro'];
        $id_his_flight = $_POST['id_his_flight'];
        $id_his_ticket = $_POST['id_his_ticket'];

        $sql_history = mysqli_query($con,"DELETE FROM `ticket_info` WHERE `profile_id` = '$id_his_pro' AND `ticket_id` = '$id_his_ticket' AND `flight_id` = '$id_his_flight'");
        
        if($sql_history){
            header("Location: admin.php");
        }
        else{
            echo "Something went wrong";
        }

    }
    //Quản lý chuyến bay (Thêm chuyến bay phổ thông, thương gia)
    //Đoạn mã thêm chuyến bay phổ thông sau khi admin chọn thêm và điền đầy đủ thông tin chuyến bay phổ thông
    else if(isset($_POST['add_flight_pt'])){
        $check = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` LIKE '%PT%'");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` LIKE '%PT%' ORDER BY `flight_id` DESC LIMIT 1 ");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["flight_id"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("PT0000");
        }

        $from_location = $_POST['from_location'];
        $to_location = $_POST['to_location'];
        $check_st = "SELECT * FROM `start_place` WHERE `id_start` = '$from_location'";
        $check_st_run = mysqli_query($con,$check_st);
        while($row_check_st = $check_st_run->fetch_array(MYSQLI_ASSOC)){
            $from_location = $row_check_st['name_start'];
        }
        $check_des = "SELECT * FROM `destination` WHERE `id_des` = '$to_location'";
        $check_des_run = mysqli_query($con,$check_des);
        while($row_check_des = $check_des_run->fetch_array(MYSQLI_ASSOC)){
            $to_location = $row_check_des['name_des'];
        }

        $airline_id = $_POST['airline_id'];
        $airline_name = $_POST['airline_name'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];
        $duration = $_POST['duration'];
        $total_seats = $_POST['total_seats'];
        $price = $_POST['price'];
        

        $sql = "INSERT INTO `flight` VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ssssssssii",$id,$airline_id,$airline_name,$from_location,$to_location,$departure_time,$arrival_time,$duration,$total_seats,$price);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: admin.php");
        }
    }
    //Đoạn mã thêm chuyến bay thương gia sau khi admin chọn thêm và điền đầy đủ thông tin chuyến bay thương gia
    else if(isset($_POST['add_flight_tg'])){
        $check = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` LIKE '%TG%'");
        if(mysqli_num_rows($check) != 0){
            $recent_id = mysqli_query($con,"SELECT * FROM `flight` WHERE `flight_id` LIKE '%TG%' ORDER BY `flight_id` DESC LIMIT 1 ");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["flight_id"];
            }
            $id = createID($last);
        }
        else{
            $id = createID("TG0000");
        }

        $from_location = $_POST['from_location'];
        $to_location = $_POST['to_location'];
        $check_st = "SELECT * FROM `start_place` WHERE `id_start` = '$from_location'";
        $check_st_run = mysqli_query($con,$check_st);
        while($row_check_st = $check_st_run->fetch_array(MYSQLI_ASSOC)){
            $from_location = $row_check_st['name_start'];
        }
        $check_des = "SELECT * FROM `destination` WHERE `id_des` = '$to_location'";
        $check_des_run = mysqli_query($con,$check_des);
        while($row_check_des = $check_des_run->fetch_array(MYSQLI_ASSOC)){
            $to_location = $row_check_des['name_des'];
        }

        $airline_id = $_POST['airline_id'];
        $airline_name = $_POST['airline_name'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];
        $duration = $_POST['duration'];
        $total_seats = $_POST['total_seats'];
        $price = $_POST['price'];
        

        $sql = "INSERT INTO `flight` VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stm = $con -> prepare($sql);
        $stm -> bind_param("ssssssssii",$id,$airline_id,$airline_name,$from_location,$to_location,$departure_time,$arrival_time,$duration,$total_seats,$price);
        if(!$stm->execute()){
            die($stm->error);
        }
        else{
            header("location: admin.php");
        }
    }
    
?>