<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project_1</title>
</head>
<body>
    <?php
    $xml = "https://www.rt.com/rss/sport/";
    $long_description = 200;
    $feeds = simplexml_load_file($xml);
    foreach ($feeds->channel as $feed) {
        foreach ($feed as $item) {
    ?>
            <div> 
                <?php
               
                echo ('<img src="' . $item->image . '" alt="" width="auto" height="auto">');
                echo ('<h4><a href="' . $item->link . '" target="_blank">' . $item->title . '</a></h4>');
                if (strlen($item->description) > $long_description) {
                    echo ('<p>"' . substr($item->description, 0, $long_description) . '...."</p>');
                } elseif ($item->description != NULL || $item->description != '') {
                    echo ('<p>' . $item->description . '</p>');
                }
                ?>
            </div>
</body>

</html>
<?php

        }
    }
        
        

