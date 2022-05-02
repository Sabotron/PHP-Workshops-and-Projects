<?php

require_once("Conexion.php");
class RSS extends Conexion
{
    private $strName;
    private $strRSS;
    private $intCategoryId;
    private $intUserId;

    function addSource(string $name, string $rss,int $categoryId,int $userId) // Agrega nuevas fuentes rss a la base de datos
    {
        $sql = "INSERT INTO source(name, rss, categoryId, userId)  
        VALUES(?,?,?,?)";
        $this->strName = $name;
        $this->strRSS = $rss;
        $this->intCategoryId = $categoryId;
        $this->intUserId = $userId;
        $result= $this->connect()->prepare($sql);
        $result->execute([$name, $rss, $categoryId, $userId]);
        if ($result) {
            header("Location: ../View/DashboardView.php");
        }
        else
        {
            header("Location: ../View/DashboardView.php?error=db_issue");
        }
    }


    function updtRss(int $id, string $name, string $rss,int $categoryId) // actualiza fuentes existentes en la base de datos
    {
        $sql = "UPDATE source SET name = ?, rss = ?, categoryId = ? WHERE id = ?";
        $result= $this->connect()->prepare($sql);
        if($result->execute([$name, $rss, $categoryId, $id]))
        {
           header("Location: ../View/DashboardView.php");   
        }
        else
        {
            header("Location: ../View/DashboardView.php?error=db_issue");
        }
      
    }

    function getSources($userId) // Obtiene las fuentes relacionadas con el id del usuario.
    {
        $sql= "SELECT s.id as id, s.name as source, c.name as category 
            FROM source s
            INNER JOIN category c
            ON s.categoryId = c.id
            WHERE s.userId = ? "; 
        $result= $this->connect()->prepare($sql);
        if($result->execute([$userId]))
        {
            return $result;
        }  
        
    }


    function getSource($id) // Obtiene una fuente de acuerdo al id
    {
        $sql= "SELECT * FROM source WHERE id = ? "; 
        $result= $this->connect()->prepare($sql);
        if($result->execute([$id]))
        {
            return $result;    
        }   
    }


    function deleteRss(int $id){ // elimina una fuente por medio de su id, también los feeds relacionados

        $sql1= "DELETE FROM source WHERE id = ?";
        $result= $this->connect()->prepare($sql1);
        $result->execute([$id]);    
        $sql2 = "DELETE FROM feed WHERE sourceId = ?";
        $result= $this->connect()->prepare($sql2);
        $result->execute([$id]);  
        header("Location: ../View/DashboardView.php");
    }
} // end of class RSS

