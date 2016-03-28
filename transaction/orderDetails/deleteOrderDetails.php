<?php 
//include "connection2.php"; /** calling of connection.php that has the connection code **/ 
include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
$id = $_GET['id'];

		
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result = $pdo->prepare("DELETE FROM ORDER_DETAILS WHERE ID= $id");
	$result->execute();
			header('Location: orderDetails.php');
	
?>
