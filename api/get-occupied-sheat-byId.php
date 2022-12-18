<?php
        require_once ('connect.php');
    if (!isset($_POST['flight_id']) ) {
        die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
    }
    
    $id = $_POST['flight_id'];
    $sql = 'SELECT * FROM seat where flight_id = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($id));
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