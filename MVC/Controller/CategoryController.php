<?php
require_once("../Model/Category.php");
$objCategory = new Category();

if (isset($_POST['UpdateCategory'])) { // Invoca la función del modelo para modificar una categoría
    $id = $_POST['id'];
    $strName = $_POST['name'];
    $objCategory->updateCategory($strName, $id);
}

if (isset($_GET['del']))  // pide al modelo que elimine una categoría de acuerdo al id
{
    $id = $_GET['del'];
    $objCategory->deleteCategory($id);
}

function getFilteredCategory() // filtra del modelo la categoría seleccionada por el usuario
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


function UserCategories() // llama la función que trae una categoría por su id desde el modelo
{
    $objCategory = new Category();
    $uid = $_SESSION['user']['id'];
    $result = $objCategory->getUserCategories($uid);
    return  $result;
}
