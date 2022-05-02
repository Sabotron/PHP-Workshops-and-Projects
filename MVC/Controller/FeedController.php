<?php
    require_once("../Model/Feed.php");
    
    function getFeeds() // obiene los feeds del usuario desde el modelo por medio del id
    {   
        $objFeed = new Feed();
        $uid = $_SESSION['user']['id'];
        $result = $objFeed->getUserFeeds($uid);
        return $result;
    }

    function getFilteredFeeds()// obiene los feeds del usuario según la categoría desde el modelo
    {          
        if(isset($_GET['filter']))
    {
        $objFeed = new Feed();
        $categoryId = $_GET['filter'];
        $result = $objFeed->getUserFilter($categoryId);
        return $result;
        }
    }

    function searchFeeds() // consulta si existen feeds que contengan la palabra consultada por el usuario
    {
        if(isset($_POST['find']))
        {
            $objFeed = new Feed();
            $uid = $_SESSION['user']['id'];
            $find = $_POST['word'];
            $result = $objFeed->findUserFeed($uid, $find);
            return $result;
            }
    }

?>