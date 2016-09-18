<?php
	error_reporting(E_ERROR);
	require "facebooksdk/src/Facebook/autoload.php";
	session_start();

	$fb = new Facebook\Facebook([
		'app_id' => '106696449791785',
		'app_secret' => '3b0391470d5e4fe9d8f1e8b58dba8528',
		'default_graph_version' => 'v2.5'
	]);
?>