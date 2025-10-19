<?php
	
	require 'class/db.php';

    $db = NEW glPDO("mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["database"] . ";charset=utf8", $config["db"]["user"], $config["db"]["pass"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>