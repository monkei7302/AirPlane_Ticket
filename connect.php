<?php
    $con = new mysqli("localhost","root","","air_plane");
    if($con -> connect_error){
        die("Connection failed" .$con->connect_error);
    }

?>