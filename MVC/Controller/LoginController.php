<?php
require_once("../Model/Login.php");

            if (isset($_POST['Login'])) {
            $objLogin = new Login();
            $strEmail = $_POST['email'];
            $strPass = $_POST['password'];
            $objLogin->checkUser($strEmail, $strPass);
            }
            

