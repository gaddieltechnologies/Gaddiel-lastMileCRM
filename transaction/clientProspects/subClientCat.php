<?php
 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
$id = ($_REQUEST["id"] <> "") ? trim( addslashes($_REQUEST["id"])) : "";
if ($id <> "" ) {
                       $pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query ="select  catg.CLIENT_CATEGORY CLIENT_CATEGORY, catg.DESCRIPTION DESCRIPTIONN, ccls.CLIENT_CLASS CLIENT_CLASS,ccls.DESCRIPTION DESCRIPTION
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_CATEGORY catg,
									 CLIENT_CLASS ccls
									 WHERE  clfn.CLIENT_CATEGORY_ID = catg.ID
									 AND    clfn.CLIENT_CLASS_ID = ccls.ID
                                     AND clfn.ID =$id";
									//echo $country_id;
						$result = $pdo->prepare($query);
					  $result->execute();
                   	 $row = $result->fetch();					
					 $clientcat = $row['CLIENT_CATEGORY'];
					 $clientcl = $row['CLIENT_CLASS'];
					Database::disconnect();	
				
					}
?>

<div class="span3"><label>Category</label><input type="text" value="<?php echo $row['CLIENT_CATEGORY'];?>" disabled="disabled" class="span3"></div>
<div class="span3"><label>Category Description</label><input type="text" value="<?php  echo $row['DESCRIPTIONN'];?> "disabled="disabled" class="span3"></div>
<div class="span1"><label>Class</label><input type="text" value="<?php echo $row['CLIENT_CLASS'];?>" disabled="disabled" class="span1"></div>
<div class="span4"><label>Class Description</label><input type="text" value=" <?php  echo $row['DESCRIPTION'];?> " disabled="disabled" class="span4"></div>