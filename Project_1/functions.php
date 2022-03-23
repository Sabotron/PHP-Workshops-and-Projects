<?php

function connection()// Credenciales para conexión a DB.
{
    $conn = mysqli_connect('localhost', 'root', '', 'project_1');
    return $conn;
}
//------------------------------------------------------------------------------------------
function getCategory() // Extrae los nombres de las categorías.
{
    $conn = connection();
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);
    return $result;
}
//------------------------------------------------------------------------------------------
function getSource() // Obtiene las fuentes asignadas al ID del usuario.
{
    $id = $_SESSION['user']['id'];
    $query = "SELECT s.id as id, s.name as source, c.name as category 
                FROM source s
                INNER JOIN category c
                ON s.categoryId = c.id
                WHERE s.userId = '$id'"; 
    $conn = connection();
    $result = mysqli_query($conn, $query);
    return $result;
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
        header('Location: index.php?error=forced_logout'); // Termina la sesión en caso de mala intención.
    }
}
//------------------------------------------------------------------------------------------
function adminSession() // Verifica que un "administrador" sea el que accede a otra página.
{
    session_start();
    $user = $_SESSION['user'];
    if ($user['usertype'] != 2) {
        header('Location: index.php?error=forced_logout'); // Termina la sesión en caso de mala intención.
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

function showCats()// Obtiene las categorías asignadas al ID del usuario.
{ 
    $conn = connection();
    $id = $_SESSION['user']['id'];
    $query = "SELECT DISTINCT c.id, c.name
                FROM source s
                INNER JOIN category c
                ON s.categoryId = c.id 
                WHERE s.userId = '$id'";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
       echo("Base de datos vacía");
    }
    return $result;
}
//------------------------------------------------------------------------------------------
function userFeed()
{
   $conn = connection();
   $userId = $_SESSION['user']['id'];
   $query = "SELECT * FROM feed WHERE userId = '$userId'";
   $result = mysqli_query($conn, $query);
   if(!$result)
    {
       echo("Base de datos vacía");
    }
    return $result;
}