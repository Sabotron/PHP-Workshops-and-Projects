<?php require("functions.php");
// Guarda nuevas noticias creadas por los usuarios.
if (isset($_POST['addFeed'])) {
    addFeed($_POST);
}
function addFeed()
{
    $conn = connection();
    $sourceId = $_POST['source'];
    $categoryId = $_POST['category'];
    session_start();
    $userId = $_SESSION['user']['id'];


    $query = "INSERT INTO feed(sourceId, categoryId, userId)  
        VALUES('$sourceId', '$categoryId', '$userId')";
        echo($query);

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Errorsote");

    }
    header("Location: dashboard.php");
}