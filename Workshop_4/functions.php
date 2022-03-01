<?php

function connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'workshop_4');
    return $conn;
};

//------------------------------------------------------------------------------------------
if (isset($_POST['save'])) {
    save_user($_POST);
} elseif (isset($_POST['login'])) {
    checkUser($_POST);
}
//------------------------------------------------------------------------------------------
function save_user()
{

    $conn = connection();
    $userType = $_POST['userType'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    $query = "INSERT INTO user( type, name, lastname, nickname, password) 
          VALUES('$userType','$name', '$lastname', '$nickname', '$password')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Fatal Error");
    }
    header("Location: login.php");
}
//------------------------------------------------------------------------------------------
function checkUser()
{
    $conn = connection();
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE nickname = '$nickname' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $type = $row['type'];
    //    echo ("$name" . " " . "$type");
        if($type == 1) {
            session_start();
            $_SESSION['user'] = $name;   
            header('Location: user_list.php');
          } else {
            header('Location: login.php');
          }
    }
    if (!$result) {
        die("jueputa");
    }
}
?>
