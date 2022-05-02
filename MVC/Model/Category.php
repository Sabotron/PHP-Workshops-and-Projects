<?php

require_once("Conexion.php");
class Category extends Conexion
{
    private $strName;

    function addCategory(string $name) // agrega una categoría nueva a la base de datos
    {
        $sql = "INSERT INTO category(name) VALUES(?)";
        $this->strName = $name;
        $result= $this->connect()->prepare($sql);
        $result->execute([$name]);
        if ($result) {
            header("Location: ../View/AdminView.php");
        } 
        else 
        {
            header("Location: ../View/AdminView.php?error=db_issue");
        }
       
    }

    function getCategories() // Obtiene todas las categorías de la base de datos
    {
        $sql= "SELECT * FROM category ORDER BY name ASC"; 
        $result= $this->connect()->prepare($sql);
        if($result->execute())   
        {
            return $result;
        }
    }


    function getCategory(int $id) // Obtiene una categoría por medio del id
    {
        $sql= "SELECT * FROM category WHERE id = ?"; 
        $result= $this->connect()->prepare($sql);
        if($result->execute([$id]))
        {
            return $result;
        }   
       
    }

    function getUserCategories(int $uid)// Obtiene las categorías asignadas al id del usuario.
    { 
        $sql = "SELECT DISTINCT c.id, c.name
                    FROM source s
                    INNER JOIN category c
                    ON s.categoryId = c.id 
                    WHERE s.userId = ? ";
        $result= $this->connect()->prepare($sql);
        if($result->execute([$uid]))
        {
            return $result;
        }
    }


    function updateCategory(string $name, int $id) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "UPDATE category SET name = ? WHERE id = ?"; 
        $result= $this->connect()->prepare($sql);
        if($result->execute([$name, $id]))
        {
            header("Location: ../View/AdminView.php");
        }         
        else 
        {
            header("Location: ../View/AdminView.php?error=db_issue");
        }
   
    }


    function deleteCategory(int $id){

        $sql1= "DELETE FROM category WHERE id = ?";
        $result= $this->connect()->prepare($sql1);
        $result->execute([$id]);   
        $sql2 = "DELETE FROM source WHERE categoryId = ?";
        $result= $this->connect()->prepare($sql2);
        $result->execute([$id]);   
        $sql3 = "DELETE FROM feed WHERE categoryId = ?";
        $result= $this->connect()->prepare($sql3);
        $result->execute([$id]);  
        header("Location: ../View/AdminView.php");
    }

}
