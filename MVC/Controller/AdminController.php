<?php
    require_once("../Model/Category.php");
    $objCategory = new Category();

if (isset($_POST['AddCategory'])) {
    $strName = $_POST['name'];
    $objCategory->addCategory($strName);
}


function getCategories()
{
    $objCategory = new Category();
    $result = $objCategory->getCategories();
    return $result;
}


