<?php
include("db.php");
if (isset($_POST['save'])){
    $nickname = $_POST['nickname'];
    $user_name = $_POST['user_name'];
    $last_name = $_POST['last_name'];
    $name = $_POST['category'];
    $description = $_POST['description'];
    $query1 = "INSERT INTO user(nickname, user_name, last_name) 
              VALUES('$nickname', '$user_name', '$lastname')";
            
    $query2 = "INSERT INTO category(name, description)   
              VALUES('$name', '$description')";

    $result = mysqli_query($conn, $query1);
    if (!$result){
        die("Fatal Error");
    }    
    $result = mysqli_query($conn, $query2);
    if (!$result){
        die("Fatal Error");
    }   

    header("Location: index.php");
}
?>