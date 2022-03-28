<?php 
    include_once './apis/connect.php';

    $errors['errors_list'] = array();

    if(isset($_GET['api_key']) && $_GET['api_key'] == "qw4hd"){
        if(isset($_POST['title']) && isset($_POST['body'])){
            if(empty($_POST['title'])){
                array_push($errors['errors_list'], "Title Field is empty");
            }
    
            if(empty($_POST['body'])){
                array_push($errors['errors_list'], "Body Field is empty");
            }
    
            if(count($errors['errors_list']) == 0){
                $title = htmlspecialchars(mysqli_real_escape_string($con, $_POST['title']));
                $body = htmlspecialchars(mysqli_real_escape_string($con, $_POST['body']));
                $date = date('Y-m-d H:i:s A');
    
                $sql = "INSERT into posts (title,body,created_at) VALUES ('$title', '$body', '$date')";
                $res = mysqli_query($con, $sql);
    
                if($res){
                    $status[] = array("status" => "Data Inserted Successfully");
                }else{
                    $status[] = array("status" => "Something Went Wrong with Data");
                }
                echo json_encode($status);
            }else{
                echo json_encode($errors);
            }
        }else{
            echo json_encode(array("status" => "Title or Body fields are missing!"));
        }
    }else{
        echo json_encode(array('status' => "API Key is Unauthorzied"));
    }

?>