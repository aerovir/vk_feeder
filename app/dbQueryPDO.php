<?php

$user = 'develop_user';
$pass = 'develop_password';
$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];

$conn = new PDO('pgsql:host=db;dbname=db', $user, $pass, array(PDO::ATTR_PERSISTENT => true));


    for($i = 0; $i < count($rssArray); $i++){
        $xmlAll = simplexml_load_file($rssArray[$i]);
        foreach($xmlAll->channel->item as $item){
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $conn->exec("INSERT INTO vk_feeder (url, add_time, is_published, source_id) VALUES ('$item->link', DATE '$item->pubDate', false, '$i'+1)");
            } catch (Exception $e) {
                $conn->rollBack();
                echo "Ошибка: " . $e->getMessage();
            }
            $conn->commit();
        }
    $conn = NULL;
