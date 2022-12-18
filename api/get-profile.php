<?php
    
    require_once ('connect.php');

    $sql = 'SELECT * FROM passenger_profile where passenger_username = ?';

    $name= $_POST['passenger_username'];

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($name));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))

    {
        $data[] = $row;
    }

    echo json_encode(array('status' => true, 'data' => $data));


?>