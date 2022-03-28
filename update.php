<?php 
    include_once './apis/connect.php';
    
    if(isset($_GET['api_key']) && $_GET['api_key'] == "qw4hd"){
        if(isset($_POST['title']) && isset($_POST['body']) && isset($_POST['id'])){
            $id = htmlspecialchars(mysqli_real_escape_string($con, $_POST['id']));
            $sql = "SELECT * from posts WHERE id = '$id'";
            $res = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) == 1){
                while($row = mysqli_fetch_array($res)){
                    if(!empty($_POST['title'])){
                        $title = htmlspecialchars(mysqli_real_escape_string($con, $_POST['title']));
                    }else{
                        $title = $row['title'];
                    }
                    if(!empty($_POST['body'])){
                        $body = htmlspecialchars(mysqli_real_escape_string($con, $_POST['body']));
                    }else{
                        $body = $row['body'];
                    }
                }
                $sql = "UPDATE posts SET title = '$title', body = '$body' WHERE id = '$id'";
                $res = mysqli_query($con, $sql);
                if($res){
                    $status[] = array("status" => "Data Updated Successfully");
                }else{
                    $status[] = array("status" => "Something Went Wrong with Data");
                }
                echo json_encode($status);
            }else{
                echo json_encode(array("status" => "ID is wrong!"));
            }  
        }else{
            echo json_encode(array("status" => "Title, Body or ID fields are missing!"));
        }
    }else{
        echo json_encode(array('status' => "API Key is Unauthorzied"));
    }
?>