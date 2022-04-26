<?php
    require_once("../Model/Category.php");
    $objCategory = new Category();

if (isset($_POST['UpdateCategory'])) {
    $id = $_POST['id'];
    $strName = $_POST['name'];
    $objCategory->updateCategory($strName, $id);
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $objCategory->deleteCategory($id);
}   


function getCategory(){
    $objCategory = new Category();
    $id = $_GET['id'];
    $result = $objCategory->getCategory($id);
    return  $result;
    }
  

 
