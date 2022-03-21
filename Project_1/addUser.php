<?php require("functions.php");
// Guarda nuevos usuarios al registrarse.
if (isset($_POST['addUser'])) {
    addUser($_POST);
}
function addUser()
{
    $conn = connection();// functions.php
    $userType = $_POST['userType'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordOk = $_POST['passwordOk'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    if (strlen($address2) < 1) { // Cuando el usuario solo tiene una dirección, la 2nda se guarda como "none".
        $address2 = "none";
    }
    if (strcmp($password, $passwordOk) == 0) { // Compara los passwords para validarlos.

        $query = "INSERT INTO user( usertype, name, lastname, telephone, 
                                 email, password, country, city, 
                                  postalCode, address1, address2)  
          VALUES('$userType', '$name', '$lastname', '$telephone', 
                                 '$email', '$password', '$country', '$city', 
                                  '$postalCode', '$address1', '$address2') ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            header("Location: register.php?error=db_issue"); 
        }
        header("Location: index.php"); // Redirecciona al Login después del registro exitoso.
    } else {
        header("Location: register.php?error=pswd_not_match"); 
    }
}
