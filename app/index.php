<?php
require __DIR__ . '/vendor/autoload.php';
use \Curl\Curl;

$curl = new Curl();


$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    // 'https://3dnews.ru/news/rss/',
    // 'https://mobiltelefon.ru/yrss2.php',
    // 'https://helpix.ru/news/shtml/rss.xml'
];

$time = time();
$count = 0;


// for($i = 0; $i < count($rssArray); $i++){
// $xml = simplexml_load_file($rssArray[$i]);

    // foreach($xml as $channel){
    //     foreach($channel as $item){
            $curl->post('https://api.vk.com/method/wall.post', array(
            'owner_id' => '-34696799',
            'attachments' => 'https://habr.com/ru/post/491018/',
            'access_token' => 'db1f0f3c2b4d6a8dd9f9cb838dfd19542c06e8eb038f8caa1bc7312fc09dc11a440bcf4216309885e260b',
            'signed' => '1',
            // 'publish_date' => $time+600,
            'close_comments' => '0',
            'v' => '5.103'
            ));
            // sleep(1);
//         }
//     }
// }

if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo 'Data server received via POST:' . "\n";
    var_dump($curl->response->form);
}