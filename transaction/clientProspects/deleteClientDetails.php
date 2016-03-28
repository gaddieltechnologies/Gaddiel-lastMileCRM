<?php 
//include "connection2.php"; /** calling of connection.php that has the connection code **/ 
include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
$id = $_GET['id'];

mysql_query("DELETE FROM CLIENT_DETAILS WHERE ID= $id");

			header('Location: clientProspects.php');
	
?>
