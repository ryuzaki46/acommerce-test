<?php
	require "main.php";
	 
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email', 'user_posts', 'publish_actions'];
	$callback    = 'http://localhost/acommerce_test/callback.php';
	$loginUrl    = $helper->getLoginUrl($callback, $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>