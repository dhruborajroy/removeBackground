<?php
if(isset($_POST['submit'])){
	$rand=rand(111111111,999999999);
	move_uploaded_file($_FILES['file']['tmp_name'], $rand.$_FILES['file']['name']);
	
	$file="[WEBSITE-LINK]/".$rand.$_FILES['file']['name'];	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	$post = array(
		'image_url' => $file,
		'size' => 'auto'
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$headers = array();
	$headers[] = 'X-Api-Key: API_KEY';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	$fp=fopen($rand.'.png',"wb");
	fwrite($fp,$result);
	fclose($fp);
	echo "<img src='$rand.png'>";
}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="file"/>
	<input type="submit" name="submit"/>
</form>
