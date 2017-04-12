<?php
$access_token = 'mmVUjVCOox5K+ZzBq/tyA3HAX6XKng5kjjRiHxhcib2vNJ1jdqRWSI4Fatg00DhJpN1v4pNVQkzgj+rbFqh2A0TV8rymXuXy5R24BZAN3c7zDBCObVbdF2ZfHGiJXme8SAjoaowamn349PcXNKI70gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;