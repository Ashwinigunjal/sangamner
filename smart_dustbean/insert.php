<?php

require_once('conn.php');



if(isset($_GET['did']) && isset($_GET['fill'])){
	$dust_id = $_GET['did'];
	$fill = $_GET['fill'];

	$query = $pdo->prepare("UPDATE bins SET filled = :fill WHERE dust_id=:did");
	$result = $query->execute(array("did"=>$dust_id, "fill"=>$fill));
	if (!$result) {echo "err";}
        else {echo "One Row Inserted Successfully ";}
}




?>