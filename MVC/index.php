<?php
 
 //require_once("Includes/autoload.php");
 require_once("Controller/UserController.php");
 
 $objUser = new UserController();

 $objUser->showUserView("Hanzel");
 //$objUser->createUser("Roberto",1122445, "beto@mail.com");
 $objUser->showUserView("Roberto");
?>