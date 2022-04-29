<?php
require_once("Conexion.php");

class Feed extends Conexion
{
    private $strSource;
    private $strTitle;
    private $strDescription;
    private $strImage;


    function getUserFeeds()
    {
        $intUid = $_SESSION['user']['id'];
        $sql = "SELECT * FROM feed WHERE userId = ?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$intUid]);
        return $result;
    }

    function getUserFilter($categoryId)
    {
        $intUid = $_SESSION['user']['id'];
        $sql = "SELECT * FROM feed WHERE userId = ? AND categoryId = ?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$intUid, $categoryId]);
        return $result;
    }
}
