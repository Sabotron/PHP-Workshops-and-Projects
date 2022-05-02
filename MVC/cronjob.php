<?php
$feedCount = 0; // cantidad de feeds totales
$msgError = "\n Hubo un error O_O \n"; // mensaje cuando no se guarda un feed
$long_description = 200; // cantidad maxima de caracteres para descripción
$conn = mysqli_connect('localhost', 'root', '', 'project_1'); // método de conexión
$query0 = "DELETE FROM feed WHERE id > 0"; // elimina todos los feeds anteriores de la BD
$result0 = mysqli_query($conn, $query0); 
if(!$result0)
{
    echo($msgError);
} else {
    echo("Borrando Feeds anteriores... ");
}
$query1 = "SELECT * FROM source"; // solicita las fuentes guardadas en BD

$result1 = mysqli_query($conn, $query1);
if (!$result1) {
    echo($msgError);
} else {
    while ($row = mysqli_fetch_array($result1)) { // asigna variables a la información desfragmentada de las fuentes
        $srcId = $row['id']; // id de la fila
        $srcRss = $row['rss']; // link de la fuente
        $srcCategory = $row['categoryId']; // id de la categoría asignada
        $srcUser = $row['userId']; // id del usuario
        $feeds = simplexml_load_file($srcRss); // carga el xml correspondiente a la fuente
        foreach ($feeds->channel as $feed) { 
            if (!empty($feed)) {

                foreach ($feed as $item) {// recorre el xml por nodos
                    $description = $item->description;
                    if (strlen($description) > $long_description) {
                        $description = substr($description, 0, $long_description) . '...';
                    }
                    $title = $item->title;
                    $link = $item->link;
                    $image = $item->image;
                    if (empty($image)) // si no encuentra imagen, lo almacena como "none"
                    {
                        $image = "none";
                    }
                  if (!empty($title) && !empty($link)) { // verifica que los campos no estén vacíos
                        $query2 = "INSERT INTO feed(sourceId, categoryId, userId, title, description, link, img) 
                                    VALUES('$srcId', '$srcCategory', '$srcUser', '$title', '$description', '$link', '$image'); ";
                        $result2 = mysqli_query($conn, $query2); // ejecuta el insert
                        if (!$result2) {
                            echo($msgError);
                        } else {
                            echo ("\nAgregando Feed: ".$title);PHP_EOL;
                            $feedCount ++;
                        }
                   }
                }
            }
        }
    }
    echo("\n\nTotal de Feeds agregados: ".$feedCount."  \n");PHP_EOL; // imprime la cantidad de feeds almacenados al final
}
