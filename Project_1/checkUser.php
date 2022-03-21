<?php

require("functions.php");

if (isset($_POST['login'])) {
    checkUser($_POST);
}

function checkUser() //Verifica la existencia del usuario que intenta "loguearse"
{
    $conn = connection();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'"; // Compara el email y el password del usuario.
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_array($result);
        if ($user['usertype'] == 1) { // Filtro para asignar sesiones, usuario cliente = 1, administradores = 2.
            session_start();
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');
        } elseif ($user['usertype'] == 2) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: admin.php');
        }
    } else {
        header('Location: index.php?error=user_not_found');
        session_start();
        session_destroy();
    }
    if (!$result) {
        header('Location: index.php?error=db_issue');
    }
}
