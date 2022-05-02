<?php
    require_once("../Model/RSS.php");
    require_once("../Model/Category.php");

    $objRss = new RSS();
    $objCategory = new Category();

if (isset($_POST['AddRss'])) { // llama la función del modelo para agregar una fuente nueva
    session_start();
    $intUserId = $_SESSION['user']['id'];
    $strName = $_POST['name'];
    $strRss = $_POST['rss'];
    $intCategoryId = $_POST['categoryId'];
    $objRss->addSource ($strName, $strRss, $intCategoryId, $intUserId);
}

if (isset($_POST['updtRss'])) { // invoca la función del modelo para actualizar datos de la fuente
    $intId = $_POST['id'];
    $strName = $_POST['name'];
    $strRss = $_POST['rss'];
    $intCategoryId = $_POST['categoryId'];
    $objRss->updtRSS ($intId, $strName, $strRss, $intCategoryId );
}

function getSources() // solicita al modelo las fuentes relacionadas con el usuario
{
    $intUserId = $_SESSION['user']['id'];
    $objRss = new RSS();
    $result = $objRss->getSources($intUserId);
    return $result;
}

function getSource() // pide al modelo que retorne la fuente de acuerdo al id
{
    $id = $_GET['id'];
    $objRss = new RSS();
    $result = $objRss->getSource($id);
    return $result;
}

function getCategories() // solicita todas las cateogrías al modelo
{
    $objCategory = new Category();
    $result = $objCategory->getCategories();
    return $result;
}

if (isset($_GET['del'])) { // envía el id de una fuente al modelo para que la función la elimine
    $objRss = new RSS();
    $id = $_GET['del'];
    $objRss->deleteRss($id);
}

