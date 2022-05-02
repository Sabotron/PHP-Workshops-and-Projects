<?php
require_once("../Model/User.php");
$objUser = new User();

if (isset($_POST['UpdateUser'])) { // verifica los nuevos datos al modificar un usuario antes de enviarlos al modelo
    $intId = $_POST['id'];
    $strName = $_POST['name'];
    $strLastname = $_POST['lastname'];
    $strTelephone = $_POST['telephone'];
    $strEmail = $_POST['email'];
    $strPassword = $_POST['password'];
    $strConfirm = $_POST['confirm'];
    $strCountry = $_POST['country'];
    $strCity = $_POST['city'];
    $intPostalCode = $_POST['postalCode'];
    $strAddress1 = $_POST['address1'];
    $strAddress2 = $_POST['address2'];
    if ($strPassword === $strConfirm) {
        $objUser->updateUser( // ejecuta la función del modelo para modificar los datos
            $intId,
            $strName,
            $strLastname,
            $strTelephone,
            $strEmail,
            $strPassword,
            $strCountry,
            $strCity,
            $intPostalCode,
            $strAddress1,
            $strAddress2,
        );
    }
    else 
    {
        header("Location: ../View/RegisterView.php?error=pswd_not_match");
    }
}

if (isset($_POST['AddUser'])) {// verifica los datos al agregar un nuevo usuario antes de enviarlos al modelo
    $intUserType = $_POST['type'];
    $strName = $_POST['name'];
    $strLastname = $_POST['lastname'];
    $strTelephone = $_POST['telephone'];
    $strEmail = $_POST['email'];
    $strPassword = $_POST['password'];
    $strConfirm = $_POST['confirm'];
    $strCountry = $_POST['country'];
    $strCity = $_POST['city'];
    $intPostalCode = $_POST['postalCode'];
    $strAddress1 = $_POST['address1'];
    $strAddress2 = $_POST['address2'];
    if (strlen($strAddress2) < 1 || $strAddress2 == null) {
        $strAddress2 = "none";
    }
    if ($strPassword === $strConfirm) {
        $objUser->addUser( // ejecuta la función del modelo para guardar al nuevo usuario
            $intUserType,
            $strName,
            $strLastname,
            $strTelephone,
            $strEmail,
            $strPassword,
            $strCountry,
            $strCity,
            $intPostalCode,
            $strAddress1,
            $strAddress2
        );
        
        $objUser->mailUser($strEmail, $strName, $strPassword);
    } else 
    {
        header("Location: ../View/UserView.php?error=pswd_not_match");
    }
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $objUser->deleteUser($id); // llama la función para eliminar un usuario desde el modelo
}

function getUsers()
{
    $objUser = new User();
    if($result = $objUser->getUsers()) // invoca la función del modelo que retorna todos los usuarios
    {
        return  $result;
    }
    
}

function getUser()
{
    $objUser = new User();
    $id = $_GET['id'];
    if($result = $objUser->getUser($id)) // obtiene un usuario desde el modelo por medio del id
    {
        return  $result;
    }
    
}

