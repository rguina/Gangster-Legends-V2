<?php
	
	require 'class/db.php';

	$options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	);
    $db = NEW glPDO("mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["database"], $config["db"]["user"], $config["db"]["pass"], $options);

?>