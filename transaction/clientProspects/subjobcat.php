<?php 
ob_start();

include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
   $SECode = ($_REQUEST["SECode"] <> "") ? trim( addslashes($_REQUEST["SECode"])) : "";
if ($SECode <> "" ) {
                       $pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query ="SELECT RI_CODE,RI_DESCRIPTION FROM JOB_HIERARCHY WHERE SE_CODE = '$SECode'";
									//echo $country_id;
						$result = $pdo->prepare($query);
					  $result->execute();
                   	 $row = $result->fetch();
					 $RIcode = $row['RI_CODE'];
				           
					 $RIdescription = $row['RI_DESCRIPTION'];
					 
					Database::disconnect();					
					}		
?>	
<html>

<div class="span5"><label>RI Code</label><input type="text" value="<?php echo $row['RI_CODE'];?> (<?php echo $row['RI_DESCRIPTION'];?>)" name="RI_CODE" id="RI_CODE" disabled="disabled" class="span5"></div>
</html>
<?php ob_end_flush();
?>				