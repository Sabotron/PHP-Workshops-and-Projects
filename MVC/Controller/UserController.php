<?php
require_once("../Model/User.php");
$objUser = new User();

if (isset($_POST['UpdateUser'])) {
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
        $objUser->updateUser(
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
}

if (isset($_POST['AddUser'])) {
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
        $objUser->addUser(
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
    }
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $objUser->deleteUser($id);
}

function getUsers()
{
    $objUser = new User();
    $result = $objUser->getUsers();
    return  $result;
}

function getUser()
{
    $objUser = new User();
    $id = $_GET['id'];
    $result = $objUser->getUser($id);
    return  $result;
}
