<?php require("functions.php");
//  Assigns variables to the user information, then inserts it into database
if (isset($_POST['addUser'])) {
    addUser($_POST);
}
function addUser()
{
    $conn = connection();
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
    if (strlen($address2) < 1) {
        $address2 = "none";
    }
    if (strcmp($password, $passwordOk) == 0) { // Compares password in case of missmatch

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
        header("Location: index.php"); // after submission, redirects to login page.
    } else {
        header("Location: register.php?error=pswd_not_match"); // reloads the page in case of error.
    }
}
