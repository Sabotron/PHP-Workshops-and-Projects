<?php
require_once("../Model/Category.php");
$objCategory = new Category();

if (isset($_POST['UpdateCategory'])) {
    $id = $_POST['id'];
    $strName = $_POST['name'];
    $objCategory->updateCategory($strName, $id);
}

if (isset($_GET['del'])) 
{
    $id = $_GET['del'];
    $objCategory->deleteCategory($id);
}

function getFilteredCategory()
{
    $id = $_GET['filter'];
    $objCategory = new Category();
    $result = $objCategory->getCategory($id);
    return  $result;
}

function getCategory()
{
    $id = $_GET['id'];
    $objCategory = new Category();
    $result = $objCategory->getCategory($id);
    return  $result;
}


function UserCategories()
{
    $objCategory = new Category();
    $uid = $_SESSION['user']['id'];
    $result = $objCategory->getUserCategories($uid);
    return  $result;
}
