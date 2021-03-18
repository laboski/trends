<?php 

	require_once 'config.php';


	$conn = new PDO($settings['dsn'], $settings['username'], $settings['password']);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
