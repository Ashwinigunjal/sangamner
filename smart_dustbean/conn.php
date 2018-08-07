<?php


	$dbname = "smart_dustbean";
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";

	try {
		$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	   die("ERROR: Could not establish database connection: " . $e->getMessage());
	}

?>