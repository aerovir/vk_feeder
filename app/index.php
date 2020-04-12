<?php

// $connection = pg_connect("host=db dbname=db user=develop_user password=develop_password");

$time = time();

$user = 'develop_user';
$pass = 'develop_password';

$group_id = "";
$token = "";//вместо этого тут ваш токен
$api_ver = "";
$url = 'https://api.vk.com/method/wall.post?';

// $countOfRowsFeeds = "SELECT COUNT(*) FROM vk_feeder WHERE is_published=false";
// $countOfRowsFeeders = "SELECT COUNT(*) FROM source_feed";

$conn = new PDO('pgsql:host=db;dbname=db', $user, $pass);

$counter1 = $conn->prepare("SELECT COUNT(*) FROM vk_feeder WHERE is_published=false");
$counter2 = $conn->prepare("SELECT COUNT(*) FROM source_feed");
$counter3 = $conn->prepare("SELECT url FROM vk_feeder WHERE is_published=false AND source_id=$i LIMIT 1");
$counter1->execute();
// $counter2->execute();
$countOfRowsFeeds = $counter2->execute()->fetchColumn();
$countOfRowsFeeders = $counter1->fetchColumn();
$publishUrl = $counter3->fetch();

echo $countOfRowsFeeds;

// for($i = 0; $i < $counter1->execute(); $i++){
//     // for($i = 1; $i < $countOfRowsFeeders + 1; $i++){
//     //     $counter3 = $conn->prepare("SELECT url FROM vk_feeder WHERE is_published=false AND source_id=$i LIMIT 1");
//     //     $publishUrl = $counter3->fetch();
//     //     echo $publishUrl[0]."<br/>";
//     //     $conn->exec("UPDATE vk_feeder SET is_published=true WHERE url='$publishUrl[0]'");
        
//     // }
//     // sleep(1);
//     echo $i;
// }

// for($i = 0; $i < count($rssArray); $i++){
//     $xmlAll = simplexml_load_file($rssArray[$i]);
//     foreach($xmlAll->channel->item as $item){
//         $ch = curl_init();
//         curl_setopt_array( $ch, array(
//             CURLOPT_POST    => TRUE,
//             CURLOPT_RETURNTRANSFER => TRUE,
//             CURLOPT_SSL_VERIFYPEER => FALSE,
//             CURLOPT_SSL_VERIFYHOST => FALSE,
//             CURLOPT_POSTFIELDS     => array(
//             "owner_id" => $group_id,
//             "from_group" => 1,
//             "attachment" => $item->link,
//             "publish_date" => $time+$count,
//             "access_token" => $token,
//             "v" => $api_ver
//         ),
//             CURLOPT_URL => $url,
//         ));
//         $query = curl_exec($ch);
//         echo $query;
//         curl_close($ch);
//         $count += 600;
//         sleep(1);
//     }
// }
