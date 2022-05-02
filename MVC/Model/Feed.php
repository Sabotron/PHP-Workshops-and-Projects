<?php
require_once("Conexion.php");

class Feed extends Conexion
{
    // variables de los feeds, están sin uso, los feeds los carga el cronjob 
    private $strSource;
    private $strTitle;
    private $strDescription;
    private $strImage;


    function getUserFeeds() // obtiene todas las categorías relacionadas al usuario
    {
        $intUid = $_SESSION['user']['id'];
        $sql = "SELECT * FROM feed WHERE userId = ?";
        $result = $this->connect()->prepare($sql);
        if($result->execute([$intUid]))
        {
           return $result; 
        }
        
    }

    function getUserFilter($categoryId) // filtra los feeds del usuario por la categoría seleccionada
    {

        $intUid = $_SESSION['user']['id'];
        $sql = "SELECT * FROM feed WHERE userId = ? AND categoryId = ?";
        $result = $this->connect()->prepare($sql);
        if($result->execute([$intUid, $categoryId]))
        {
            return $result;
        }
       
    }


 // consulta si existen títulos o descripciones que coincidan con la petición del usuario relacionadas a su id
    function findUserFeed(int $intUid, string $find)
    {
        $findString = "%$find%";
        $sql = "SELECT * FROM feed WHERE userId = ? AND description LIKE ? OR userId = ? AND title LIKE ?";
        $result = $this->connect()->prepare($sql);
        if($result->execute([$intUid, $findString, $intUid, $findString]))
        {
            return $result;
        }
    }

}
