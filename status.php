<?php
	require "main.php";

	$today = date("d M Y");
	$apikey = "6e8defff4a6475604ea6b3dc3ebe8540";
	$city = $_POST['city'];
	$ch = curl_init();

	if(isset($_SESSION['token'])) {
	
	//weather
		$url = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&APPID=".$apikey."";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		$cuaca = json_decode($result);

		$weather = $cuaca->weather[0]->description;
		$message = "The weather of"." ".$city." "."at"." ".$today." "."is"." ".$weather; 

	// post on facebook
		$data = array(
			message => $message
		);

		$res = $fb->post('/me/feed', $data, $_SESSION['token']);
		header("Location: weather.php");
	} else {
		echo "Sorry, You cannot use the app without these permissions. Go back to <a href = 'index.php'>home</a>.";
	  	exit();
	}
?>