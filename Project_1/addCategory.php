<?php require("functions.php");
// Guarda nuevas categorías creadas por el administrador.

if (isset($_POST['addCategory'])) {
    addCategory($_POST);
}

function addCategory()
{
    $conn = connection();// functions.php
    $name = $_POST['name'];
         $query = "INSERT INTO category(name)  
          VALUES('$name') ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        header("Location: admin.php?error=db_issue"); 
    }
    header("Location: admin.php");
}
