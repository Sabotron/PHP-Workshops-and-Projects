<?php
    //require_once("Includes/autoload.php");
    require_once("Model/User.php");
    class UserView extends User
    {
        public function showUser($name)
        {
            $results = $this -> getUser($name);
            echo "Nombre: ". $results[0]['nombre']. " <br>";
            echo "Telefono: ". $results[0]['telefono']. " <br>";
            echo "Email: ". $results[0]['email']. " <br>";
         }

    }// End of class Userview

?>