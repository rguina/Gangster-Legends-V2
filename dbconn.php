<?php
	
	require 'class/db.php';

	$options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
    $db = NEW glPDO("mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["database"], $config["db"]["user"], $config["db"]["pass"], $options);
	$db->exec("SET NAMES utf8mb4");

?>