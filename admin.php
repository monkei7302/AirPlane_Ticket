<?php
    require 'connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminpage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<script>
        function openfunction(evt, functionName) {
        var i, sidebar, tablinks;
        sidebar = document.getElementsByClassName("content");
        for (i = 0; i < sidebar.length; i++) {
            sidebar[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
        document.getElementById(functionName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click(); 
</script>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
        <div class="container-fluid">
            <a href="admin.php" class="navbar-brand ms-5">Sky Airlines</a>
            <button type="button" class="navbar-toggler me-5" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <button class="tablinks" onclick="openfunction(event, 'dashboard')" id="defaultOpen">Trang chủ Admin</button>
        <button class="tablinks" onclick="openfunction(event, 'flight')">Quản lý thông tin chuyến bay</button>
        <button class="tablinks" onclick="openfunction(event, 'hightflight')">Quản lý chuyến bay nổi bật</button>
        <button class="tablinks" onclick="openfunction(event, 'startlocation')">Quản lý địa điểm bắt đầu </button>
        <button class="tablinks" onclick="openfunction(event, 'destinationlocation')">Quản lý địa điểm đến</button>
        <button class="tablinks" onclick="openfunction(event, 'customer')">Quản lý khách hàng</button>
        <button class="tablinks" onclick="openfunction(event, 'historybook')">Quản lý lịch sử mua vé</button>
        <button class="tablinks" onclick="openfunction(event, 'statistic')">Thống kê</button>
    </div>
    <div id="dashboard" class="content">
        <p class="title">Trang chủ Admin</p>
        <div class="container-dasboard">
            <div class="card-function tablinks" onclick="openfunction(event, 'flight')">Quản lý thông tin chuyến bay</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'hightflight')">Quản lý chuyến bay nổi bật</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'startlocation')">Quản lý địa điểm bắt đầu</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'destinationlocation')">Quản lý địa điểm đến</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'customer')">Quản lý khách hàng</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'historybook')">Quản lý lịch sử mua vé</div>
            <div class="card-function tablinks" onclick="openfunction(event, 'statistic')">Thống kê</div>
        </div>
    </div>
    <!-- Quản lý thông tin chuyến bay -->
    <div id="flight" class="content">
        <div class="title">
            <span>Quản lý thông tin chuyến bay</span>
            <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#addflight" >Add</button>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>Flight ID</th>
                <th>Information</th>
                <th>Total Seats</th>
                <th>Available Seats</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
            <tr>
                <td>FL01</td>
                <td>
                    Mã máy bay:.... <br>
                    Tên máy bay:....<br>
                    Đi từ:...... <br>
                    Đến đâu:.... <br>
                    Giờ khởi hành:... <br>
                    Giờ đến:.... <br>
                    Khoảng thời gian:.... <br>
                </td>
                <td>100</td>
                <td>10</td>
                <td>1.150.000 VNĐ</td>
                <td>
                    <button href="#" class="btn-update" data-bs-toggle="modal" data-bs-target="#updateflight">Edit</button>    <button href="#" class="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteflight">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Quản lý chuyến bay nổi bật-->
    <div id="hightflight" class="content">
        <div class="title">
            <span>Quản chuyến bay nổi bật</span>
            <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#addhightflight" >Add</button>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>ID</th>
                <th>Flight Name</th>
                <th>Image</th>
                <th>Date</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
                <?php
                $sql_hl = "SELECT * FROM `hight_light`";
                $sql_hl_run = mysqli_query($con,$sql_hl);
                while($row_hl = $sql_hl_run->fetch_array(MYSQLI_ASSOC)){
                    $id_hl = $row_hl['id_hight'];
                    $name_hl = $row_hl['flight_name'];
                    $image_hl = $row_hl['image'];
                    $date_hl = $row_hl['date'];
                    $des_hl = $row_hl['description'];
                    $price_hl = $row_hl['price'];

                    echo '
                    <tr>
                        <td class="hl_id">'.$id_hl.'</td>
                        <td>'.$name_hl.'</td>
                        <td>'.$image_hl.'</td>
                        <td>'.$date_hl.'</td>
                        <td>'.$des_hl.'</td>
                        <td>'.number_format(floatval($price_hl),0,',','.').' đ</td>
                        <td>
                            <button class="btn_update_hight_light" data-bs-toggle="modal" data-bs-target="#updatehightflight">Edit</button>    <button class="btn_delete_hight_light" data-bs-toggle="modal" data-bs-target="#deletehightflight">Delete</button>
                        </td>
                    </tr>
                    ';
                }
                ?>
            
            </tbody>
        </table>
    </div>
    <!-- Quản lý địa điểm bắt đầu -->
    <div id="startlocation" class="content">
        <div class="title">
            <span>Quản lý địa điểm bắt đầu</span>
            <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#addstart" >Add</button>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>Start ID</th>
                <th>Start Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
                <?php
                    $sql_start = "SELECT * FROM `start_place`";
                    $sql_start_run = mysqli_query($con,$sql_start);
                    while($row_start = $sql_start_run->fetch_array(MYSQLI_ASSOC)){
                        echo '
                        <tr>
                            <td class="start_id">'.$row_start['id_start'].'</td>
                            <td>'.$row_start['name_start'].'</td>
                            <td>
                                <button class="btn_delete_start" data-bs-toggle="modal" data-bs-target="#deletestart">Delete</button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            
            </tbody>
        </table>
    </div>
    <!-- Quản lý địa điểm đến -->
    <div id="destinationlocation" class="content">
        <div class="title">
            <span>Quản lý địa điểm đến</span>
            <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#adddes" >Add</button>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>Destination ID</th>
                <th>Destination Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
            <?php
                    $sql_des = "SELECT * FROM `destination`";
                    $sql_des_run = mysqli_query($con,$sql_des);
                    while($row_des = $sql_des_run->fetch_array(MYSQLI_ASSOC)){
                        echo '
                        <tr>
                            <td class="des_id">'.$row_des['id_des'].'</td>
                            <td>'.$row_des['name_des'].'</td>
                            <td>
                                <button class="btn_delete_des" data-bs-toggle="modal" data-bs-target="#deletedes">Delete</button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Quản lý khách hàng -->
    <div id="customer" class="content">
        <div class="title">
            <span>Quản lý khách hàng</span>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>PhoneNumber</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
            <?php
                $sql_profile = "SELECT * FROM `passenger_profile`";
                $sql_profile_run = mysqli_query($con,$sql_profile);
                while($row_pro = $sql_profile_run->fetch_array(MYSQLI_ASSOC)){
                    $id_pro = $row_pro['profile_id'];
                    $name_pro = $row_pro['first_name'] . " " . $row_pro['last_name'];
                    $username_pro = $row_pro['passenger_username'];
                    $password_pro = $row_pro['password'];
                    $gender_pro = $row_pro['gender'];
                    $address_pro = $row_pro['address'];
                    $phone_pro = $row_pro['phone'];
                    $email_pro = $row_pro['email'];

                    echo '
                    <tr>
                        <td class="user_id">'.$id_pro.'</td>
                        <td>'.$name_pro.'</td>
                        <td>'.$username_pro.'</td>
                        <td>'.$password_pro.'</td>
                        <td>'.$gender_pro.'</td>
                        <td>'.$address_pro.'</td>
                        <td>'.$phone_pro.'</td>
                        <td>'.$email_pro.'</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#deletecustomer" class="btn_delete_user">Delete</button>
                        </td>
                    </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
    </div>
    <!-- Quản lý lịch sử mua vé của khách -->
    <div id="historybook" class="content">
        <div class="title">
            <span>Quản lý lịch sử mua vé của khách</span>
        </div>
        
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>Profile ID</th>
                <th>Flight ID</th>
                <th>Ticket ID</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-body">
                <?php
                    $sql_history = "SELECT * FROM `history`";
                    $sql_history_run = mysqli_query($con,$sql_history);
                    while($row_history = $sql_history_run->fetch_array(MYSQLI_ASSOC)){
                        echo '
                        <tr>
                            <td class="his_pro_id">'.$row_history['profile_id'].'</td>
                            <td class="his_ticket_id">'.$row_history['ticket_id'].'</td>
                            <td class="his_flight_id">'.$row_history['flight_id'].'</td>
                            <td>
                                <button class="btn_delete_history" data-bs-toggle="modal" data-bs-target="#deletehistory">Delete</button>
                            </td>
                        </tr>
                        ';

                    }
                ?>
            
            </tbody>
        </table>
    </div>
    <!-- Thống kê -->
    <div id="statistic" class="content">
        <div class="title">
            <span>Thống kê</span>
        </div>
        <table class="table table-hover">
            <thead>
            <tr style="text-align: center;">
                <th>Ticket ID</th>
                <th>Flight ID</th>
                <th>Airline Name</th>
                <th>Total Ticket Sales</th>
                <th>Total Revenue</th>
            </tr>
            </thead>
            <tbody id="table-body">
            <tr>
                <td>TK01</td>
                <td>FL01</td>
                <td>Tên</td>
                <td>10</td>
                <td>1.150.000 VNĐ</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Thêm chuyến bay -->
    <div class="modal" id="addflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chuyến bay</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form>
                    <div class="modal-body">
                        Nhập mã chuyến bay<br>
                        <input type="text" class="input-control" placeholder="Nhập mã chuyến bay" name="flight_id"/>
                        Nhập mã máy bay<br>
                        <input type="text" class="input-control" placeholder="Nhập mã máy bay" name="airline_id"/>
                        Nhập tên máy bay<br>
                        <input type="text" class="input-control" placeholder="Nhập tên máy bay" name="airline_name"/>
                        Chọn địa điểm xuất phát<br>
                        <select id="from_location" name="from_location">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                        Chọn địa điểm đến<br>
                        <select id="to_location" name="to_location">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                        Chọn ngày giờ bay<br>
                        <input type="datetime-local" class="input-control" name="departure_time"/>
                        Chọn ngày giờ đến<br>
                        <input type="datetime-local" class="input-control" name="arrival_time"/>
                        Nhập khoảng thời gian bay<br>
                        <input type="text" class="input-control" placeholder="Nhập khoảng thời gian bay" name="duration"/>
                        Nhập tổng số ghế<br>
                        <input type="number" class="input-control" placeholder="Nhập tổng số ghế" name="total_seats"/>
                        Nhập số ghế còn<br>
                        <input type="number" class="input-control" placeholder="Nhập số ghế còn" name="available_seats"/>
                        Nhập giá<br>
                        <input type="text" class="input-control" placeholder="Nhập giá" name="price"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn add-color">Add</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sửa chuyến bay -->
    <div class="modal" id="updateflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa chuyến bay</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form>
                    <div class="modal-body">
                        Nhập mã chuyến bay<br>
                        <input type="text" class="input-control" placeholder="Nhập mã chuyến bay" name="flight_id"/>
                        Nhập mã máy bay<br>
                        <input type="text" class="input-control" placeholder="Nhập mã máy bay" name="airline_id"/>
                        Nhập tên máy bay<br>
                        <input type="text" class="input-control" placeholder="Nhập tên máy bay" name="airline_name"/>
                        Chọn địa điểm xuất phát<br>
                        <select id="from_location" name="from_location">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                        Chọn địa điểm đến<br>
                        <select id="to_location" name="to_location">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                        Chọn ngày giờ bay<br>
                        <input type="datetime-local" class="input-control" name="departure_time"/>
                        Chọn ngày giờ đến<br>
                        <input type="datetime-local" class="input-control" name="arrival_time"/>
                        Nhập khoảng thời gian bay<br>
                        <input type="text" class="input-control" placeholder="Nhập khoảng thời gian bay" name="duration"/>
                        Nhập tổng số ghế<br>
                        <input type="number" class="input-control" placeholder="Nhập tổng số ghế" name="total_seats"/>
                        Nhập số ghế còn<br>
                        <input type="number" class="input-control" placeholder="Nhập số ghế còn" name="available_seats"/>
                        Nhập giá<br>
                        <input type="text" class="input-control" placeholder="Nhập giá" name="price"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn add-color">Update</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa chuyến bay -->
    <div class="modal" id="deleteflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa chuyến bay</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <p>Bạn có chắc muốn xóa chuyến bay này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sửa lịch sử mua vé của khách -->
    <div class="modal" id="updatehistory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa lịch sử mua vé của khách</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form>
                    <div class="modal-body">
                        Nhập mã profile<br>
                        <input type="text" class="input-control" placeholder="Nhập mã profile" name="profile_id"/>
                        Nhập mã chuyến bay<br>
                        <input type="text" class="input-control" placeholder="Nhập mã chuyến bay" name="flight_id"/>
                        Nhập mã vé<br>
                        <input type="text" class="input-control" placeholder="Nhập mã vé" name="ticket_id"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn add-color">Update</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa lịch sử mua vé của khách -->
    <div class="modal" id="deletehistory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa lịch sử mua vé</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_his_pro" id="delete_id_his_pro">
                        <input type="hidden" name="id_his_flight" id="delete_id_his_flight">
                        <input type="hidden" name="id_his_ticket" id="delete_id_his_ticket">
                        <p>Bạn có chắc muốn xóa lịch sử mua vé này không này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_history" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Thêm chuyến bay nổi bật -->
    <div class="modal" id="addhightflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chuyến bay nổi bật</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        Nhập tên chuyến bay<br>
                        <input type="text" class="input-control" placeholder="Nhập tên chuyến bay" name="flight_name"/>
                        Chọn hình ảnh <br>
                        <div class="input-group custom-file-button">
                            <label class="input-group-text" for="inputGroupFile">Chọn ảnh</label>
                            <input type="file" class="form-control" id="inputGroupFile" name="image" required>
                        </div>
                        Chọn ngày<br>
                        <input type="date" class="input-control" name="date"/>
                        Nhập mô tả<br>
                        <textarea id="des" name="description" rows="4" cols="50"></textarea><br>
                        Nhập giá<br>
                        <input type="text" class="input-control" placeholder="Nhập giá" name="pricehight"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn add-color" name="add_hl" value="add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sửa chuyến bay nổi bật -->
    <div class="modal" id="updatehightflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa chuyến bay nổi bật</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_hl" id="update_id_hl">
                        Tên chuyến bay<br>
                        <input type="text" class="input-control" placeholder="Nhập tên chuyến bay" name="flight_name" id="flight_name"/>
                        Hình ảnh <br>
                        <input type="text" class="input-control" name="image" id="image">    
                        Ngày khởi hành<br>
                        <input type="text" class="input-control" name="date" id="date"/>
                        Mô tả<br>
                        <input type="text" class="input-control" id="description" name="description"/><br>
                        Giá tiền<br>
                        <input type="text" class="input-control" placeholder="Nhập giá" name="pricehight" id="pricehight"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn add-color" name="update_hl" value="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa chuyến bay nổi bật -->
    <div class="modal" id="deletehightflight">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa chuyến bay nổi bật</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_hl" id="delete_id_hl">
                        <p>Bạn có chắc muốn xóa chuyến bay nổi bật này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_hl" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Thêm địa điểm bắt đầu -->
    <div class="modal" id="addstart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm địa điểm bắt đầu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        Nhập tên địa điểm bắt đầu<br>
                        <input type="text" class="input-control" placeholder="Nhập tên địa điểm bắt đầu" name="start_name"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn add-color" name="add_start" value="add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa địa điểm bắt đầu -->
    <div class="modal" id="deletestart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa địa điểm bắt đầu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_start" id="delete_id_start">
                        <p>Bạn có chắc muốn xóa địa điểm bắt đầu này không này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_start" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Thêm địa điểm đến -->
    <div class="modal" id="adddes">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm địa điểm đến</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        Nhập tên địa điểm đến<br>
                        <input type="text" class="input-control" placeholder="Nhập tên địa điểm đến" name="des_name"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn add-color" name="add_des" value="add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa địa điểm đến -->
    <div class="modal" id="deletedes">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa địa điểm đến</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="id_des" id="delete_id_des">
                        <p>Bạn có chắc muốn xóa địa điểm đến này không này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_des" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Xóa khách hàng -->
    <div class="modal fade" id="deletecustomer" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa khách hàng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="admin_handle.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id_user">
                        <p>Bạn có chắc muốn xóa khách hàng này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_user" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
        $(document).ready(function(){
            $('.btn_delete_user').click(function(e){
                e.preventDefault();
                var id = $(this).closest('tr').find('.user_id').text();
                
                $('#delete_id_user').val(id);
                $('#deletecustomer').modal('show');
            })

            $('.btn_delete_hight_light').click(function(e){
                e.preventDefault();
                var id = $(this).closest('tr').find('.hl_id').text();
                
                $('#delete_id_hl').val(id);
                $('#deletehightflight').modal('show');
            })

            $('.btn_update_hight_light').click(function(e){
                $('#updatehightflight').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id_hl').val(data[0]);
                $('#flight_name').val(data[1]);
                $('#image').val(data[2]);
                $('#date').val(data[3]);
                $('#description').val(data[4]);
                $('#pricehight').val(data[5]);
            })

            $('.btn_delete_start').click(function(e){
                e.preventDefault();
                var id = $(this).closest('tr').find('.start_id').text();
                
                $('#delete_id_start').val(id);
                $('#deletestart').modal('show');
            })

            $('.btn_delete_des').click(function(e){
                e.preventDefault();
                var id = $(this).closest('tr').find('.des_id').text();
                
                $('#delete_id_des').val(id);
                $('#deletedes').modal('show');
            })

            $('.btn_delete_history').click(function(e){
                e.preventDefault();
                var id1 = $(this).closest('tr').find('.his_pro_id').text();
                var id2 = $(this).closest('tr').find('.his_flight_id').text();
                var id3 = $(this).closest('tr').find('.his_ticket_id').text();
                
                $('#delete_id_his_pro').val(id1);
                $('#delete_id_his_flight').val(id2);
                $('#delete_id_his_ticket').val(id3);

                $('#deletehistory').modal('show');
            })
        })
</script>
</html>