<?php
require_once("Conexion.php");
class Login extends Conexion
    {
    function checkUser($email,$pass) //Verifica la existencia del usuario que intenta "loguearse"
    {
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?"; // Compara el email y el password del usuario.
        $result= $this->connect()->prepare($sql);
        $result->execute([$email, $pass]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) 
        {
            session_start();
            $_SESSION['user'] = $user;
            if ($_SESSION['user']['usertype'] == 1) { // Filtro para asignar sesiones, usuario cliente = 1, administradores = 2.
                header('Location: ../View/DashboardView.php');
            } elseif ($_SESSION['user']['usertype'] == 2) {
                header('Location:../View/AdminView.php');
            }
        } else {
            session_start();
            session_unset();
            session_destroy();            
            header('Location: ../View/LoginView.php?error=user_not_found');
        }
        if (!$user) {
            header('Location: ../View/LoginView.php?error=user_not_found');
        }
    }
    }//End of class Loginmodel

?>