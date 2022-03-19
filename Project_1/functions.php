<?php

function connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'project_1');
    return $conn;
}
//------------------------------------------------------------------------------------------
function getCategory()
{
    $conn = connection();
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);
    return $result;
}
//------------------------------------------------------------------------------------------
function errorHandler()
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

function clientSession()
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 1) {
        header('Location: index.php?error=forced_logout');
    }
}
//------------------------------------------------------------------------------------------
function adminSession()
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 2) {
        header('Location: index.php?error=forced_logout');
    }
}
//------------------------------------------------------------------------------------------
function welcomeUser()
{ 
    $name = $_SESSION['user']['name'];
    $lastname = $_SESSION['user']['lastname'];
    return ("Bienvenid@ " . $name . " " . $lastname."!");
}
//------------------------------------------------------------------------------------------
