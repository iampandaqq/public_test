<?php
if(isset($_POST))
{
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	$secret="6Lcj4BYUAAAAAK_5zRJrn0mlQ2fGxFlq056NoDVA";
	if(isset($_POST["g-recaptcha-response"]))
	{
		$link="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST["g-recaptcha-response"]."&remoteip=".$_SERVER["HTTP_X_FORWARDED_FOR"];
	echo $link;	
	$response = file_get_contents($link);
	
	$response = json_decode($response, true);
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	if($response["success"] === true){
		echo "success";
	}else{
		echo "check failed!";
	}
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<form action="./ip.php" method="post">
<input type="text" name="name" value="" / ><br>
<input type="text" name="email" value="" / >
<div class="g-recaptcha" data-sitekey="6Lcj4BYUAAAAAGhGe1p_xvbFuA4NzKc0Nx9BSKJd"></div>
<br>
<input type="submit" value="submit" />
</form>
</body>
</html>