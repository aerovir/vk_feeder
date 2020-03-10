<?php

$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];
$count = 0;
$allLinksArray = [];
$resLinksArray = [];
$time = time();

$group_id = "-34696799";
$token = "6721464779df7d7f14b3894384534dc174b28fb3e5944d1c2db3c408c87a71a23f4684ec869f6d8b36290";//вместо этого тут ваш токен
$api_ver = "5.103";
$url = 'https://api.vk.com/method/wall.post?';
for($i = 0; $i < count($rssArray); $i++){
    $xmlAll = simplexml_load_file($rssArray[$i]);
    foreach($xmlAll->channel->item as $item){
        $ch = curl_init();
        curl_setopt_array( $ch, array(
            CURLOPT_POST    => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_POSTFIELDS     => array(
            "owner_id" => $group_id,
            "from_group" => 1,
            "attachment" => $item->link,
            "publish_date" => $time+$count,
            "access_token" => $token,
            "v" => $api_ver
        ),
            CURLOPT_URL => $url,
        ));
        $query = curl_exec($ch);
        echo $query;
        curl_close($ch);
        $count += 600;
        sleep(1);
    }
}
