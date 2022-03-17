<?php

function connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'project_1');
    return $conn;
};

//------------------------------------------------------------------------------------------
switch(isset($_POST))
{
    case ($_POST['save']):
        save_user($_POST);
        break;
    case ($_POST['login']):
        checkUser($_POST);
        break;
    case ($_POST['addCategory']):
        addCategory($_POST);
        echo("Switch activated");
        break;
    default:
        echo ("WTF");
    break;
}


//------------------------------------------------------------------------------------------
/*if (isset($_POST['save'])) {
    save_user($_POST);
} elseif (isset($_POST['login'])) {
    checkUser($_POST);
}*/
//------------------------------------------------------------------------------------------
function save_user()
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

    if (strcmp($password, $passwordOk) == 0) {
        $query = "INSERT INTO user( usertype, name, lastname, telephone, 
                                 email, password, country, city, 
                                  postalCode, address1, address2)  
          VALUES('$userType', '$name', '$lastname', '$telephone', 
                                 '$email', '$password', '$country', '$city', 
                                  '$postalCode', '$address1', '$address2') ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Errorsote");
            header("Location: index.php");
        }
        header("Location: login.php");
    } else {
        die("El password no concuerda");
        header("Location: index.php");
    }
}
//------------------------------------------------------------------------------------------
function checkUser()
{
    $conn = connection();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $lastname = $row['lastname'];
        $type = $row['type'];
        //    echo ("$name" . " " . "$type");
        if ($type == 1) {
            session_start();
            $_SESSION['user'] = $name . " " . $lastname;

            header('Location: dashboard.php');
        } elseif ($type == 2) {
            session_start();
            $_SESSION['user'] = $name . " " . $lastname;
            header('Location: admin.php');
        } else { {
                header('Location: login.php');
            }
        }
        if (!$result) {
            die("jueputa");
        }
    }
}
//------------------------------------------------------------------------------------------
function addCategory()
{

    $conn = connection();
    $name = $_POST['name'];

        $query = "INSERT INTO category(name)  
          VALUES('$name') ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Errorsote");
            header("Location: index.php");
        }
        header("Location: admin.php");
    }

//------------------------------------------------------------------------------------------
function getCategory()
{
    $conn = connection();
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);
    echo die($result); 
    return $result;
}