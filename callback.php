<?php
	require "main.php";
	
	$helper = $fb->getRedirectLoginHelper();
	try {
	  	$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  	echo $e->getMessage();
	  	exit();
	}
	 
	if (isset($accessToken)) {
	
		$client = $fb->getOAuth2Client();
		try {
		  $accessToken = $client->getLongLivedAccessToken($accessToken);
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo $e->getMessage();
		  exit();
		}
		$_SESSION['token'] = (string) $accessToken;
	  	header('Location: weather.php');
	  	
	} elseif ($helper->getError()) {
	 	echo "Sorry, You cannot use the app without these permissions. Go back to <a href = 'index.php'>home</a>.";
	  	exit();
	}
		
?>