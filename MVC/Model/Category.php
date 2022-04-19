<?php

require_once("Conexion.php");
class Category extends Conexion
{
    private $strName;

    function addCategory(string $name)
    {
        $sql = "INSERT INTO category(name) VALUES(?)";
        $this->strName = $name;
        $result= $this->connect()->prepare($sql);
        $result->execute([$name]);
        if (!$result) {
            die("Errorsote");
        }
        header("Location: ../View/DashboardView.php");
    }

    function getCategories() // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "SELECT * FROM category"; 
        $result= $this->connect()->prepare($sql);
        $result->execute();   
        return $result;
    }


    function getCategory(int $id) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "SELECT * FROM category WHERE id = ?"; 
        $result= $this->connect()->prepare($sql);
        $result->execute([$id]);   
        return $result;
    }

    function updateCategory(string $name, int $id) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "UPDATE category SET name = ? WHERE id = ?"; 
        $result= $this->connect()->prepare($sql);
        $result->execute([$name, $id]);   
    }
}
