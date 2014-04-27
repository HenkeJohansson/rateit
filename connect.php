<?php
include $_SERVER['DOCUMENT_ROOT'].'/rateit/password.php';

try{
	$pdo=new PDO('mysql:host=localhost;dbname=193298-rateit', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
	
}

catch (PDOException $e){
	echo 'Unable to connect to the database server';
	exit();
}


?>

