<?php
include_once 'vk.php';

// $v = new Vk(array(
//     'client_id' => 7341747, // (обязательно) номер приложения
//     'secret_key' => 'mMUU3Jsu3MbmmOjGdYDS', // (обязательно) получить тут https://vk.com/editapp?id=12345&section=options где 12345 - client_id
//     'user_id' => 5305539, // ваш номер пользователя в вк
//     'scope' => 'wall', // права доступа
//     'v' => '5.103' // не обязательно
// ));

// $url = $v->get_code_token();
// echo $url;
// if(!isset($_GET['code'])) {
//     $url = $v->get_code_token('code','index.php');
//     header("Location: $url");
// } else {
//     $access_token = $v->get_access_token($_GET['code'],'index.php');
// }
// if (!empty($access_token['access_token'])) {
// echo $access_token['access_token'];//ваш токен после подтверждения прав
// }

$rssArray = [
    'https://www.ferra.ru/exports/rss.xml',
    'https://3dnews.ru/news/rss/',
    'https://mobiltelefon.ru/yrss2.php',
    'https://helpix.ru/news/shtml/rss.xml'
];

$attachment = 'https://www.ferra.ru/news/techlife/na-video-pokazali-rossiiskii-lazernyi-pistolet-08-03-2020.htm';
$token = '6721464779df7d7f14b3894384534dc174b28fb3e5944d1c2db3c408c87a71a23f4684ec869f6d8b36290';
$config['secret_key'] = 'mMUU3Jsu3MbmmOjGdYDS';
$config['client_id'] = 7341747; // номер приложения
$config['group_id'] = -34696799; // id текущего пользователя (не обязательно)
$config['access_token'] = '6721464779df7d7f14b3894384534dc174b28fb3e5944d1c2db3c408c87a71a23f4684ec869f6d8b36290';
$config['scope'] = 'wall,photos,video'; // права доступа к методам (для генерации токена)

$v = new Vk($config);

// пример публикации сообщения на стене пользователя
// значения массива соответствуют значениям в Api https://vk.com/dev/wall.post

$response = $v->api('wall.post', array(
    'attachment' => 'https://www.ferra.ru/news/techlife/na-video-pokazali-rossiiskii-lazernyi-pistolet-08-03-2020.htm'
));