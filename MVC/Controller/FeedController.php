<?php
    require_once("../Model/Feed.php");
            

    function getFeeds()
    {   
        $objFeed = new Feed();
        $uid = $_SESSION['user']['id'];
        $result = $objFeed->getUserFeeds($uid);
        return $result;
    }

?>