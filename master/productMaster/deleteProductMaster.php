<?php 
//include "connection2.php"; /** calling of connection.php that has the connection code **/ 

 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); 
$id = $_GET['id'];

    $pdo = Database::connect();
	$sql = "DELETE FROM PRODUCT_MASTER WHERE ID= '$id'";
	$query =  $pdo->prepare( $sql );
	$query->execute();

			header('Location:productMaster.php');
	
?>

