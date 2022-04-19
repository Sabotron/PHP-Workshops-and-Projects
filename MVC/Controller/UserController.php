<?php
    require_once("View/UserView.php");
    class UserController extends UserView
    {
        public function showUserView($nombre)
        {
            $this->showUser($nombre);
        }

        public function createUser(string $nombre, int $telefono, string $email)
        {
            $this->setUser( $nombre, $telefono, $email);
        }


    }// End of class Userview
?>