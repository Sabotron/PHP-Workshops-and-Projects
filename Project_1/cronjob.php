<?php
$feedCount = 0;
$msgError = "\n Hubo un error O_O \n";
$long_description = 200;
$conn = mysqli_connect('localhost', 'root', '', 'project_1');
$query0 = "DELETE FROM feed WHERE id > 0";
$result0 = mysqli_query($conn, $query0);
if(!$result0)
{
    echo($msgError);
} else {
    echo("Borrando Feeds anteriores... ");
}
$query1 = "SELECT * FROM source";

$result1 = mysqli_query($conn, $query1);
if (!$result1) {
    echo($msgError);
} else {
    while ($row = mysqli_fetch_array($result1)) {
        $srcId = $row['id'];
        $srcRss = $row['rss'];
        $srcCategory = $row['categoryId'];
        $srcUser = $row['userId'];
        $feeds = simplexml_load_file($srcRss);
        foreach ($feeds->channel as $feed) {
            if (!empty($feed)) {

                foreach ($feed as $item) {
                    $description = $item->description;
                    if (strlen($description) > $long_description) {
                        $description = substr($description, 0, $long_description) . '...';
                    }
                    $title = $item->title;
                    $link = $item->link;
                    $image = $item->image;
                    if (empty($image))
                    {
                        $image = "none";
                    }
                  if (!empty($title) && !empty($link)) {
                        $query2 = "INSERT INTO feed(sourceId, categoryId, userId, title, description, link, img) 
                                    VALUES('$srcId', '$srcCategory', '$srcUser', '$title', '$description', '$link', '$image'); ";
                        $result2 = mysqli_query($conn, $query2);
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
    echo("\n\nTotal de Feeds agregados: ".$feedCount."  \n");PHP_EOL;
}
