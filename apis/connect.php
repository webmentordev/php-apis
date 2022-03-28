<?php 
    
    header('Content-Type: application/json');
    
    $con = mysqli_connect('localhost', 'root', '', 'apis');

    if($con){
        $con_status[] = array("status" => "Database Connected");
    }else{
        $con_status[] = array("status" => "Database Not Connected");
    }

    // echo json_encode($status);
?>