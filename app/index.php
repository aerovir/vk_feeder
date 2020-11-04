<?php

// $connection = pg_connect("host=db dbname=db user=develop_user password=develop_password");

$time = time();

$user = 'develop_user';
$pass = 'develop_password';

$group_id = "-34696799";
$token = "db1a23b4f3bb271ed8dab0fd7b6d9dd964d3cd6784693cf00021c1cfbda9c8aff5071eaa1bb71a7cb2fff";//вместо этого тут ваш токен
$api_ver = "5.70";
$url = 'https://api.vk.com/method/wall.post?';

$conn = new PDO('pgsql:host=db;dbname=db', $user, $pass);

$feedersCount = $conn->query("SELECT * FROM source_feed")->rowCount();

$feedArray = [];

$feedArray = $conn->query("SELECT url FROM vk_feeder WHERE is_published=false")->fetchAll();


$conn = NULL;

shuffle($feedArray);


 for($i = 0; $i < 50; $i++){
    $ch = curl_init();
    curl_setopt_array( $ch, array(
        CURLOPT_POST    => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_POSTFIELDS     => array(
        "owner_id" => $group_id,
        "from_group" => 1,
        "attachment" => $feedArray[$i][0],
        // "publish_date" => $time+$count,
        "access_token" => $token,
        "v" => $api_ver
    ),
        CURLOPT_URL => $url,
    ));
    $query = curl_exec($ch);
    echo $query;
    curl_close($ch);
    
    if(($i % 4) == 0){
        sleep(600);
    }
 }
