<?php 

$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];


$connection = pg_connect("host=db dbname=db user=develop_user password=develop_password");

for($i = 0; $i < count($rssArray); $i++){
    $xmlAll = simplexml_load_file($rssArray[$i]);
    foreach($xmlAll->channel->item as $item){
        $query = "INSERT INTO vk_feeder (url, add_time, is_published, source_id) VALUES ('$item->link', DATE '$item->pubDate', false, '$i'+1)";

        $result = pg_query($connection, $query);
    }
    
}

