<?php
require_once("../Model/Login.php");
// envía el password y el email a la función del modelo para chequear el usuario
            if (isset($_POST['Login'])) { 
            $objLogin = new Login();
            $strEmail = $_POST['email'];
            $strPass = $_POST['password'];
            $objLogin->checkUser($strEmail, $strPass);
            }
            

