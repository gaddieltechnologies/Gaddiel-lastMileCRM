<?php 
 /** calling of connection.php that has the connection code **/ 
 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection2.php');
$id = $_GET['id'];

mysql_query("DELETE FROM CLIENT_CLASSIFICATION WHERE ID= $id");

			header('Location:clientClassification.php');
	
?>
