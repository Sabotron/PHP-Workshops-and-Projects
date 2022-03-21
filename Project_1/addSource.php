<?php require("functions.php");
// Guarda nuevas fuentes creadas por los usuarios.
if (isset($_POST['addSource'])) {
    addSource($_POST);
}
function addSource()
{
    $conn = connection();// functions.php
    $name = $_POST['name'];
    $rss = $_POST['rss'];    
    $categoryId = $_POST['category'];
    session_start();
    $userId = $_SESSION['user']['id'];

    $query = "INSERT INTO source(name, rss, categoryId, userId)  
        VALUES('$name', '$rss', '$categoryId','$userId')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Errorsote");
    }
    header("Location: dashboard.php");
}





