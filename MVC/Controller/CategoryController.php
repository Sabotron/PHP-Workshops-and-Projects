<?php
    require_once("../Model/Category.php");
    $objCategory = new Category();

if (isset($_POST['UpdateCategory'])) {
    $id = $_POST['id'];
    $strName = $_POST['name'];
    $objCategory->updateCategory($strName, $id);
    Header("../View/AdminView");
}

function getCategory(){
    $objCategory = new Category();
    $id = $_GET['id'];
    $result = $objCategory->getCategory($id);
    return  $result;
    }
  
