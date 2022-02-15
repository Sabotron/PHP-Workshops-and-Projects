<?php

include("db.php");

if (isset($_POST['sign'])){
    $name = $_POST['name'];
    $lastn = $_POST['lastn'];
    $email = $_POST['email'];
    $province = $_POST['province'];
    $passw = $_POST['passw'];
    $query = "INSERT INTO user(name, last_name, email, province, password)  
     VALUES('$name', '$lastn', '$email', '$province', '$passw')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Fatal Error");
    }
    header("Location: index.php");
}

?>
