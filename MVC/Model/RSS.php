<?php

require_once("Conexion.php");
class RSS extends Conexion
{
    private $strName;
    private $strRSS;
    private $intCategoryId;
    private $intUserId;

    function addSource(string $name, string $rss,int $categoryId,int $userId)
    {
        $sql = "INSERT INTO source(name, rss, categoryId, userId)  
        VALUES(?,?,?,?)";
        $this->strName = $name;
        $this->strRSS = $rss;
        $this->intCategoryId = $categoryId;
        $this->intUserId = $userId;
        $result= $this->connect()->prepare($sql);
        $result->execute([$name, $rss, $categoryId, $userId]);
        if (!$result) {
            die("Errorsote");
        }
        header("Location: ../View/DashboardView.php");
    }

    function getSources($userId) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "SELECT s.id as id, s.name as source, c.name as category 
            FROM source s
            INNER JOIN category c
            ON s.categoryId = c.id
            WHERE s.userId = ? "; 
        $result= $this->connect()->prepare($sql);
        $result->execute([$userId]);   
        return $result;
    }
}
