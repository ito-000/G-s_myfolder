<?php
$url = "https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=2683663ecb7f15a1270f5c47dd929ec6&pref=PREF40&hit_per_page=50";
$json = file_get_contents($url);
$json = mb_convert_encoding($json , 'UTF8' , 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr = json_decode($json,true);
$restaurant = ['rest'][0]['name'];

echo $restaurant;
?>


