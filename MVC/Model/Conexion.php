<?php

    class Conexion 
    {
        private $host = "localhost";
        private $user = "root";
        private $pwd = "";
        private $dbName = "project_1";

        protected function connect()
        {
            $dsn = "mysql:host=" . $this->host . "; dbname=" .$this->dbName.";";
            try {
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            } catch (Exception $e) {
                echo "ERROR DE CONEXION" . $e->getMessage();
            }
           
        }
    }//End of class conexion
?>