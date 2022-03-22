<?php
// Elimina las fuentes de acuerdo al ID que entra por parámetro.
    include("functions.php");
    if(isset($_GET['id'])){
        $conn = connection();
        $id = $_GET['id'];
        $query1 = "DELETE FROM source WHERE id = $id";
        $result1 = mysqli_query($conn, $query1);
        if(!$result1){
            die("Failed to delete");
        }
        $query2 = "DELETE FROM feed WHERE sourceId = $id";// Tanbién elimina los feeds relacionados a ellas en la DB.
        $result2 = mysqli_query($conn, $query2);
        if(!$result1){
            die("Failed to delete");
        }
        header("Location: dashboard.php");
    }
?>