<?php

if (isset($_GET['logout']))
{
    logout();
}

if(isset($_GET['error']))
{
    errorHandler();
}

//------------------------------------------------------------------------------------------
function errorHandler() // Imprime un mensaje de error en diferentes circunstancias.
{
    $message = "";
    if (!empty($_REQUEST['error'])) {
        switch ($_REQUEST['error']) {
            case 'db_issue':
                $message = "Error ocurrido en la Base de Datos";
                break;
            case 'pswd_not_match':
                $message = "Debe coincidir el password!";
                break;
            case 'user_not_found':
                $message = "Usuario no encontrado!";
                break;
            case 'forced_logout':
                $message = "Ha cerrado su sesión!";
                break;
            default:
                $message = "";
                break;
        }
        return $message;
    }
}
//------------------------------------------------------------------------------------------

function clientSession() // Verifica que un usuario tipo "cliente" sea el que accede a otra página.
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 1) {
        header('Location: ../View/LoginVista.php?error=forced_logout'); // Termina la sesión en caso de mala intención.
    }
}
//------------------------------------------------------------------------------------------
function adminSession() // Verifica que un "administrador" sea el que accede a otra página.
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 2) {
        header('Location: ../View/LoginVista.php?error=forced_logout'); // Termina la sesión en caso de mala intención.
    }
}
//------------------------------------------------------------------------------------------
function welcomeUser() // Mensaje de bienvenida con el nombre-apellido del usuario.
{ 
    $name = $_SESSION['user']['name'];
    $lastname = $_SESSION['user']['lastname'];
    return ("Bienvenid@ " . $name . " " . $lastname."!");
}
//------------------------------------------------------------------------------------------
function logout()
{
session_start();
session_destroy();
header('Location: ../index.php');
}


?>