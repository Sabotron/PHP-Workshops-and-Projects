<?php

if (isset($_GET['logout']))
{
    logout(); // llama la función que elimina los datos de la sesión y redirecciona al login
}

if(isset($_GET['error']))
{
    errorHandler(); // llama al gestor de mensajes cuando llega por parámetro la palabra 'error'
}

//------------------------------------------------------------------------------------------
function errorHandler() // Gestor de mensajes de error, para diferentes circunstancias.
{
    $message = "";
    if (!empty($_REQUEST['error'])) {
        switch ($_REQUEST['error']) {
            case 'db_issue': // error en la base de datos
                $message =
                '<div class="alert alert-danger text-center" role="alert">
                    Error ocurrido en la Base de Datos
                </div>';
                break;
            case 'pswd_not_match': // error al ingresar un nuevo password
                $message =
                '<div class="alert alert-warning text-center" role="alert">
                    Debe coincidir el password!
                </div>';
                break;
            case 'user_not_found': // error al entontrar un usuario
                $message =
                '<div class="alert alert-warning text-center" role="alert">
                    Usuario no encontrado!
                 </div>';
                break;
            case 'forced_logout': // error de seguridad en la sesión
                $message =
                '<div class="alert alert-warning text-center" role="alert">
                    Su sesión ha finalizado por motivos de seguridad!
                 </div>';
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
        header('Location: ../View/LoginView.php?error=forced_logout'); // Termina la sesión si no tiene los credenciales
    }
}
//------------------------------------------------------------------------------------------
function adminSession() // Verifica que un "administrador" sea el que accede a otra página.
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 2) {
        header('Location: ../View/LoginView.php?error=forced_logout'); // Termina la sesión si no posee credenciales de admin.
    }
}
//------------------------------------------------------------------------------------------
function welcomeUser() // Mensaje de bienvenida con el nombre-apellido del usuario.(desabilitada)
{ 
    $name = $_SESSION['user']['name'];
    $lastname = $_SESSION['user']['lastname'];
    return ("Bienvenid@ " . $name . " " . $lastname."!");
}
//------------------------------------------------------------------------------------------
function logout() // elimina los datos de la sessión y redirecciona al login
{
session_start();
session_destroy();
header('Location: ../index.php');
}


?>