<?php 
    include_once './apis/connect.php';

    if(isset($_POST['id'])){
        $id = htmlspecialchars(mysqli_real_escape_string($con, $_POST['id']));;
        $sql = "DELETE from posts WHERE id = '$id'";
        $res = mysqli_query($con, $sql);

        if($res){
            $status[] = array("status" => "Data Successfully Deleted");
        }else{
            $status[] = array("status" => "Something Went Wrong with Post ID");
        }
        echo json_encode($status);
    }else{
        echo json_encode(array("status" => "ID is missing"));
    }
?>