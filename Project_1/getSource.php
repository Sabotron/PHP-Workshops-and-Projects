<?php
    require("functions.php");

    function getSource()
    {
        $conn = connection();
        $query = "SELECT * FROM source WHERE userId = ".$_SESSION['user']['id']; 
        $result = mysqli_query($conn, $query);
        return $result;
    }
