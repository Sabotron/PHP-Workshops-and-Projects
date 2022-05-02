<?php
    require_once("../Model/Category.php");
    $objCategory = new Category();

if (isset($_POST['AddCategory'])) {
    $strName = $_POST['name'];
    $objCategory->addCategory($strName); //Ingresa el nombre de una nueva categoría para que la guarde el modelo
}


function getCategories() // solicita al modelo todas las categorías en la base de datos
{
    $objCategory = new Category();
    $result = $objCategory->getCategories();
    return $result;
}


