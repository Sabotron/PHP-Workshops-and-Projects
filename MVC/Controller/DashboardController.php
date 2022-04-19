<?php
    require_once("../Model/RSS.php");
    require_once("../Model/Category.php");

    $objRss = new RSS();
    $objCategory = new Category();

if (isset($_POST['AddRss'])) {
    session_start();
    $intUserId = $_SESSION['user']['id'];
    $strName = $_POST['email'];
    $strRss = $_POST['password'];
    $intCategoryId = $_POST['password'];
    $objRss->addSource ($strName, $strRss, $intCategoryId, $intUserId);
}

function getSources()
{
    session_start();
    $intUserId = $_SESSION['user']['id'];
    $objRss = new RSS();
    $result = $objRss->getSources($intUserId);
    return $result;
}

function getCategories()
{
    $objCategory = new Category();
    $result = $objCategory->getCategories();
    return $result;
}



