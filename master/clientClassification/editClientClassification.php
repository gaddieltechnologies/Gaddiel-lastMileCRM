<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>crM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.css">
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
</head>

<body>
<style>

</style>
<!-- Navbar -->
	
	<!-- /Navbar -->
	<form action="" method="POST" onSubmit="return Validate();">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
			<!-- /Header boxes -->
			
                <div class="row">
				<!-- Sidebar -->				
				<!-- /Sidebar -->				
				<!-- Content -->
				    <div class="span12 desktop">					
						<div class="widget">                    					
						<div class="widget-content"> 
                                <div class="span7">
                                    <h3>Client Classification</h3>	
                                </div>                       
                                <div class="span3">                                                                
	                                <div class="box-holder">
	                                
	                                </div>  
	                                <div class="box-holder">
								        
										 
	                                </div>  
                                    <div class="box-holder">
                                        <a href="clientClassification.php">
                                        <div class="box"><img src="../../resources/images/e-close.png"/></br>Close</div></a>							
                                    </div>   
	                              	                              	                                              
	                             </div>                       
                        </div>                                    
                        </div>	              
                    </div>
                </div>
				<div class="row">
                
				
				
				<!-- Content -->
					<div class="span12">	
						<?php
							
							  include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); 
							ob_start();
							
							if ( !empty($_POST)) {
								
								$ID =$_GET['id'];
								//$LAST_UPDATE_DATE = $_GET['LAST_UPDATE_DATE'];
								$CLIENT_CATEGORY_ID = $_POST['CLIENT_CATEGORYY'];
								$CLIENT_CLASS_ID = $_POST['CLIENT_CLASSS'];         	
								$DESCRIPTION = $_POST['DESCRIPTIONN'];
								// query			
								
								$pdo = Database::connect();
								$sql = "SELECT * FROM CLIENT_CLASSIFICATION WHERE CLIENT_CLASS_ID = $CLIENT_CLASS_ID AND CLIENT_CATEGORY_ID = $CLIENT_CATEGORY_ID AND ID != '$ID'";
								$query =  $pdo->prepare( $sql );
								$query->execute();
								$rows = $query->fetch(PDO::FETCH_NUM);
								if($rows > 0) {
									
									echo "<div class='alert alert-info'>Client Category & Client Class already exits. No update done.... </div>";
								}
								// insert data
								else  
								{ 
									$sql = "UPDATE CLIENT_CLASSIFICATION 
									SET CREATED_DATE= NOW(), LAST_UPDATE_DATE= NOW(), CLIENT_CATEGORY_ID=?, CLIENT_CLASS_ID=?,DESCRIPTION=?
									WHERE ID=?";
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$q = $pdo->prepare($sql);
									$q->execute(array($CLIENT_CATEGORY_ID,$CLIENT_CLASS_ID,$DESCRIPTION,$ID));
									echo "<div class='alert alert-success'> Successfully Updated. </div>";
									echo '<script type="text/javascript">
									window.location.href = "clientClassification.php";
									</script>';
							    }
                            }								
							
						?>
						<?php
														
							$ID = $_GET['id']; /** get the VISIT_SCH_PERIODS ID **/
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
							$result = $pdo->prepare("select clfn.ID ID,  catg.CLIENT_CATEGORY CLIENT_CATEGORY, ccls.CLIENT_CLASS CLIENT_CLASS,clfn.DESCRIPTION DESCRIPTION
							FROM   CLIENT_CLASSIFICATION clfn,
							CLIENT_CATEGORY catg,
							CLIENT_CLASS ccls
							WHERE clfn.ID=:userid  
							AND clfn.CLIENT_CATEGORY_ID = catg.ID AND clfn.CLIENT_CLASS_ID = ccls.ID ");
							$result->bindParam(':userid', $ID);					
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++)
							{				Database::disconnect();	
								
							?>
						
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Client Classification</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span3"><label>Code</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span3"></div>
                                <div class="span3 hidefields"><label>Last Update date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE'];?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>
                                <div class="span4"><label>Client Category<font color="#FF0000"> *</font></label>
								<!--<input type="text" value="<?php echo $row['CLIENT_CATEGORY'];?>" name="CLIENT_CATEGORY" id="CLIENT_CATEGORY"  class="span4">-->
									<?php 
										
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$result = $pdo->prepare("SELECT ID,CLIENT_CATEGORY, DESCRIPTION FROM CLIENT_CATEGORY ");
										$result->execute();
										
										echo '<select autofocus  class="span4" name="CLIENT_CATEGORYY">';
																				
											for($i=0; $rowcat = $result->fetch(); $i++){                 
												Database::disconnect(); 
											?> 
												
												<option value="<?php  echo $rowcat['ID']; echo '" '; if($rowcat['CLIENT_CATEGORY'] == $row['CLIENT_CATEGORY']) { echo 'selected'; } ?> ><?php  echo $rowcat['CLIENT_CATEGORY'];?>( <?php  echo $rowcat['DESCRIPTION'];?> ) </option>  
												
												
												   
										<?php } echo '</select>';  ?>
									
								
								</div>
                                <div class="span4"><label>Client Class<font color="#FF0000"> *</font></label>
								<!--<input type="text" value="<?php echo $row['CLIENT_CLASS'];?>" name="CLIENT_CLASS" id="CLIENT_CLASS" class="span4">-->
									
									<?php 
										$result = $pdo->prepare("SELECT ID,CLIENT_CLASS,DESCRIPTION  FROM CLIENT_CLASS");
										$result->execute();
										echo '<select class="span4" name="CLIENT_CLASSS">';	
									
										for($i=0; $rowcl = $result->fetch(); $i++){																	
											Database::disconnect();	
										?>	
											<option value="<?php  echo $rowcl['ID']; echo '" '; if($rowcl['CLIENT_CLASS'] == $row['CLIENT_CLASS']) { echo 'selected'; } ?> ><?php  echo $rowcl['CLIENT_CLASS'];?>( <?php  echo $rowcl['DESCRIPTION'];?> )  </option>  
															    
									<?php } echo '</select>';  ?>
								
								</div>
								
                                <div class="span8"><label>Description</label><input type="text" value="<?php echo $row['DESCRIPTION'];?>" name="DESCRIPTIONN"  class="span8"></div>    
                                   
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="update" value="Update" class="btn btn-success span3" /></div>		
							</div>                
						</div>
					</div>
				<!-- /Content -->
                </div>
				 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/footer.php'); ?>
						<div class="dock-wrapper">    
								 <div class="navbar navbar-fixed-bottom">
									<div class="navbar-inner">
										<div class="container">                  
												<center>
													<div class="btn-group btn-group-justified">                      
														
														
														<a href="clientClassification.php" class="btn btn-default">
														<img src="../../resources/images/e-close.png"/><br>Close</a>		
													</div>   
												</center> 	
										</div>     
									</div>
								</div>
						</div>		
	           
				
        </div>
	</div>	
    </form>	
<?php
	}
?>		
</body>

</html>
