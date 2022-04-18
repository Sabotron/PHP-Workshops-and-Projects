<?php

    class Conexion 
    {

        protected function connect()
        {
            $dsn = "mysql:host=" .DB_HOST . "; dbname=" .DB_NAME.";". DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
    }//End of class conexion
?>