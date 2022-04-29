<?php
    require_once("../Model/Feed.php");
           
    function getFeeds()
    {   
        $objFeed = new Feed();
        $uid = $_SESSION['user']['id'];
        $result = $objFeed->getUserFeeds($uid);
        return $result;
    }

    function getFilteredFeeds()
    {          
        if(isset($_GET['filter']))
    {
        $objFeed = new Feed();
        $categoryId = $_GET['filter'];
        $result = $objFeed->getUserFilter($categoryId);
        return $result;
        }
    }

?>