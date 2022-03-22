<?php

$conn = mysqli_connect('localhost', 'root', '', 'project_1');
$query1 = "SELECT * FROM source";
$long_description = 200;
$result1 = mysqli_query($conn, $query1);
if (!$result1) {
    die("Errorsote");
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
                  if (!empty($title) && !empty($link)) {
                        $query2 = "INSERT INTO feed(sourceId, categoryId, userId, title, description, link, img) 
                                    VALUES('$srcId', '$srcCategory', '$srcUser', '$title', '$description', '$link', '$image'); ";
                        $result2 = mysqli_query($conn, $query2);
                        if (!$result2) {
                            die("Errorsote");
                        } else {
                            echo ($query2);
                        }
                   }
                }
            }
        }
    }
}
