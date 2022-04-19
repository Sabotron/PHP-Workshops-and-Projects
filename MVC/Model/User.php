<?php
require_once("Conexion.php");
class User extends Conexion
{
    private $strNombre;
    private $intTelefono;
    private $strEmail;


    protected function getUser($nombre)
    {
        $sql = "SELECT * FROM usuario WHERE nombre = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$nombre]);
        $result = $stmt->fetchAll();
        return $result;
    }


    public function setUser(string $nombre, int $telefono, string $email)
    {
        $this->strNombre = $nombre;
        $this->intTelefono = $telefono;
        $this->strEmail = $email;

        $sql = "INSERT INTO usuario(nombre, telefono, email) VALUES(?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$nombre, $telefono, $email]);        
    }


}// End of class usuario
