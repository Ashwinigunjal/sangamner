<?php
require_once('conn.php');

if(isset($_GET['did'])){


	$did = $_GET['did'];
	$query = $pdo->prepare("DELETE FROM bins WHERE dust_id = ?");
	$result = $query->execute(array($did));
	if ($result) {
		header("location:index.php");
	}
}

?>