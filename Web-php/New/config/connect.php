<?php 
	$link = 'mysql:host=localhost;dbname=web_qlbh';
	$conn = new PDO($link,'root','',[
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]);

?>