<?php
require __DIR__ . '/vendor/autoload.php';
use \Curl\Curl;

$curl = new Curl();

$curl -> download('https://www.ferra.ru/exports/rss.xml', 'data.xml');

$str = file_get_contents("data.xml");
$xml = simplexml_load_file("https://www.ferra.ru/exports/rss.xml");


foreach($xml as $channel){
    foreach($channel as $item){
        echo $item->link;
    }
}
