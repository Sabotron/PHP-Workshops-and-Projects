<?php require("functions.php");

if (isset($_POST['addRSS'])) {
    addRSS($_POST);
}
function addRSS()
{
    $conn = connection();
    $name = $_POST[''];
         $query = "INSERT INTO source(name)  
          VALUES('$name') ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        header("Location: index.php?error=db_issue");
    }
    header("Location: admin.php");
}