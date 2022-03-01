<?php
    include("functions.php");
    if(isset($_GET['id'])){
        $conn = connection();
        $id = $_GET['id'];
        $query = "DELETE FROM user WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Failed to delete");
        }
        header("Location: index.php");
    }
?>