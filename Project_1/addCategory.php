<?php require("functions.php");

if (isset($_POST['addCategory'])) {
    addCategory($_POST);
}

function addCategory()
{
    $conn = connection();
    $name = $_POST['name'];
  
         $query = "INSERT INTO category(name)  
          VALUES('$name') ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Errorsote");
        header("Location: admin.php?error=db_issue"); 
    }
    header("Location: admin.php");
}
