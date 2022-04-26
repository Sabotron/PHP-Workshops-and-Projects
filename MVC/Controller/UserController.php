<?php
    require_once("../Model/User.php");
    $objUser = new User();

if (isset($_POST['UpdateUser'])) {
    $id = $_POST['id'];
    $strName = $_POST['name'];
    $strLastname = $_POST['lastname'];
    $strTelephone = $_POST['telephone'];
    $strEmail = $_POST['email'];
    $strPassword = $_POST['pswd'];
    $strConfirm = $_POST['confirmPswd'];
    $strCountry = $_POST['country'];
    $strCity = $_POST['city'];
    $intPostalCode = $_POST['postalCode'];
    $strAddress1 = $_POST['address1'];
    $strAddress2 = $_POST['address2'];
    $objUser->updateUser($name, $lastname, $telephone, $email, $password, 
        $country, $city, $postalCode, $address1, $address2, $id);
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $objUser->deleteUser($id);
}   


function getUser(){
    $objUser = new User();
    $id = $_GET['id'];
    $result = $objUser->getUser($id);
    return  $result;
}
  

 
