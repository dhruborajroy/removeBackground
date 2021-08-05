<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$post = array(
    'image_url' => 'https://www.remove.bg/example.jpg',
    'size' => 'auto'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$headers = array();
$headers[] = 'X-Api-Key: CnNTHV9AYiSFTaKYCaZhByFK';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);
$name=rand(5555,9999).".png";
$fp=fopen($name,"wb");
fwrite($fp,$result);
fclose($fp);
echo "<img src='".$name."'>";
?>
