<?php

function connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'project_1');
    return $conn;
};

//------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------------------

function getCategory()
{
    $conn = connection();
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);
    echo die($result);
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
            default:
                $message = "";
                break;
        }
        return $message;
    }
}
//------------------------------------------------------------------------------------------

function checkSession()
{
    $user = $_SESSION['user'];
    if(!$user)
    {
        header('Location: index.php');
    }
}
//------------------------------------------------------------------------------------------
