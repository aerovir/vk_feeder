<?php

$user = 'develop_user';
$pass = 'develop_password';
$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];

try {
    for($i = 0; $i < count($rssArray); $i++){
        $xmlAll = simplexml_load_file($rssArray[$i]);
        foreach($xmlAll->channel->item as $item){
            $conn = new PDO('pgsql:host=db;dbname=db', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $conn->exec("INSERT INTO vk_feeder (url, add_time, is_published, source_id) VALUES ('$item->link', DATE '$item->pubDate', false, '$i'+1)");
            $conn->commit();
        }
    $conn = NULL;

    }
} catch (Exception $e) {
    $conn->rollBack();
    echo "Ошибка: " . $e->getMessage();
}