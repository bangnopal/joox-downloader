<?php

if (!@$_GET['id'])
{
  header("location:index.php");
}
if (!@$_GET['track']) {
  $filename = @$id;
} else {
  $filename = base64_decode($_GET['track']);
}
$id = @$_GET['id'];
$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_lyric?musicid='.base64_decode(trim($_GET['id'])).'&lang=id&country=id&_='.time());
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Forwarded-For: 36.73.34.109"));
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
$ly = curl_exec($ch);
curl_close($ch);
$ly = str_replace('MusicJsonCallback(', '', $ly);
$ly = str_replace(')', '', $ly);
$ly = json_decode($ly);

$ly = str_replace('[999:00.00]***Lirik didapat dari pihak ketiga***', '***Recoded By J***', base64_decode($ly->lyric));
$ly = str_replace('[offset:0]', '', $ly);
$lyric = $ly;

$saveToTmp = file_put_contents("tmp/$filename.txt", $lyric);

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename("tmp/$filename.txt") . "\""); 
readfile("tmp/$filename.txt"); 

?>