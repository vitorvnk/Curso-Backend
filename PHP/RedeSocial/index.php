<?php
	session_start();
	require('vendor/autoload.php');

	define('INCLUDE_PATH_STATIC','http://localhost/DesenvolvimentoWeb/RedeSocial/DankiCode/Views/pages');
	
	$app = new DankiCode/Application();
	$app->run();

?>