<?php
require __DIR__ . '/vendor/autoload.php';
use \Curl\Curl;

$curl = new Curl();


$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];

$xml = simplexml_load_file("https://www.ferra.ru/exports/rss.xml");


foreach($xml as $channel){
    foreach($channel as $item){
        echo $item->link;
    }
}
