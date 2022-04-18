<?php
    class LoginModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

    function checkUser() //Verifica la existencia del usuario que intenta "loguearse"
    {
        $sql = "SELECT * FROM usuario WHERE email = ".$_POST['email']." AND password = ".$_POST['password']; // Compara el email y el password del usuario.
        $request = $this->select($sql);
        return $request;
        if (mysqli_num_rows($request) == 1) {
            $user = mysqli_fetch_array($request);
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
        if (!$request) {
            header('Location: index.php?error=db_issue');
        }
    }

     

    }//End of class Loginmodel

?>