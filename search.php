<?php 
    include_once './apis/connect.php';

    if(isset($_GET['api_key']) && $_GET['api_key'] == "qw4hd"){
        if(isset($_GET['search'])){
            $search = htmlspecialchars(mysqli_real_escape_string($con, $_GET['search']));;
            $sql = "SELECT * from posts WHERE title LIKE '%$search%'";
            $res = mysqli_query($con, $sql);
            
            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_array($res)){
                    $array[] = array(
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'body' => $row['body'],
                        'created_at' => $row['created_at'],
                    );
                }
                echo json_encode($array);
            }else{
                echo json_encode(array('status' => "Database is empty!"));
            }
        }else{
            echo json_encode(array('status' => "No Search Found!"));
        }
    }else{
        echo json_encode(array('status' => "API Key is Unauthorzied"));
    }
?>