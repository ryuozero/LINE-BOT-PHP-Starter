<?php
 
$strAccessToken = "mmVUjVCOox5K+ZzBq/tyA3HAX6XKng5kjjRiHxhcib2vNJ1jdqRWSI4Fatg00DhJpN1v4pNVQkzgj+rbFqh2A0TV8rymXuXy5R24BZAN3c7zDBCObVbdF2ZfHGiJXme8SAjoaowamn349PcXNKI70gdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$jdata = "https://www.youtube.com/watch?v=Jt1h1MinlLI";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "1"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $jdata;
  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "2";	
  $arrPostData['messages'][1]['stickerId'] = "100";		
}else if($arrJson['events'][0]['message']['text'] == "pro"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เรามีโปรโมชั่นดีๆมาแนะนำทุกท่านนะครับ";
  $arrPostData['messages'][1]['type'] = "sticker";
  $arrPostData['messages'][1]['packageId'] = "3";	
  $arrPostData['messages'][1]['stickerId'] = "184";	
}else if($arrJson['events'][0]['message']['text'] == "โปร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://scontent.fbkk2-4.fna.fbcdn.net/v/t1.0-9/17200980_1753246341658205_4509040193790302709_n.jpg?oh=b1c679ec9d276f3228b31f06b9fa9bfa&oe=599B21CC";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://scontent.fbkk2-4.fna.fbcdn.net/v/t1.0-9/17200980_1753246341658205_4509040193790302709_n.jpg?oh=b1c679ec9d276f3228b31f06b9fa9bfa&oe=599B21CC";
}else if($arrJson['events'][0]['message']['text'] == "mv"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "video";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://krujunrmu.com/img/ff.mp4";
  $arrPostData['messages'][0]['previewImageUrl'] = "https://krujunrmu.com/img/ff.jpg";	
}
/*else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}*/
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>