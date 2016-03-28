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
<script>	
function Validate(){
	var valid = true;
	var message = '';
	var ccatselect = document.getElementById("ccatselect");
	var cclselect= document.getElementById("cclselect");

if(ccatselect.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client Category is required' + '\n';
	}
	
	if(cclselect.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client Class is required' + '\n';
	}

if (valid == false){
		alert(message);
		return false;
	}
}

</script>	
</head>

<body>
<style>

</style>
<!-- Navbar -->
 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	<!-- /Navbar -->
	<form action="" method="POST" onSubmit="return Validate();">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			<div class="box-container">
				
			</div>
			<!-- /Header boxes -->
			
                            <div class="row">
				<!-- Sidebar -->				
				<!-- /Sidebar -->				
				<!-- Content -->
				<div class="span12 desktop">					
				    <div class="widget">                    					
					<div class="widget-content"> 
                                            <div class="span7">
                                            <h3>Client Classification </h3>	
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
						<div class="widget">
							<div class="widget-header">
								<h3>Add Client Classification</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span3 hidefields"><label>Client Classification Code</label><input type="text" name="ID" disabled="disabled"  class="span3"></div>
                                <div class="span6 hidefields"><label>Last Update date</label><input type="text" name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>                               
								<div class="span3"><label>Client Category<font color="#FF0000"> *</font></label>
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,CLIENT_CATEGORY,DESCRIPTION FROM CLIENT_CATEGORY");
											$result->execute();
											
											echo '<select autofocus  class="span3" name="CLIENT_CATEGORY" id="ccatselect">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['CLIENT_CATEGORY'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
								</div>
								<div class="span2"><label>Client Class<font color="#FF0000"> *</font></label>
									<?php 
										$result = $pdo->prepare("SELECT ID,CLIENT_CLASS,DESCRIPTION FROM CLIENT_CLASS");
										$result->execute();
										echo '<select class="span2" name="CLIENT_CLASS" id="cclselect">';						echo  '<option>-- SELECT --</option>';						
										for($i=0; $row = $result->fetch(); $i++){																	
											Database::disconnect();	
										?>		
								
										<option value="<?php  echo $row['ID'];?>"  name="CLIENT_CLASS"><?php  echo $row['CLIENT_CLASS'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
									<?php }echo '</select>';  ?>
								</div>
								 <div class="span4"><label>Description</label><input type="text" value="" name="DESCRIPTION"  class="span4"></div>					                             
                                <div class="span2"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span2" /></div>	
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
</form>		
</body>

</html>
		<?php
			//require 'connection.php'; 
			
			if ( !empty($_POST))
			{		
			    $CLIENT_CATEGORY = $_POST['CLIENT_CATEGORY'];
				$CLIENT_CLASS = $_POST['CLIENT_CLASS'];         	
				$DESCRIPTION = $_POST['DESCRIPTION'];
				$valid = true;
				
				$pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_CLASSIFICATION WHERE CLIENT_CLASS_ID = $CLIENT_CLASS AND CLIENT_CATEGORY_ID = $CLIENT_CATEGORY ";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
				if($rows > 0) {
					echo "<script language=javascript>alert('Client Category & Client Class already exits.')</script>";
				}
				// insert data
				else  
				{ 
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO CLIENT_CLASSIFICATION (CREATED_DATE,LAST_UPDATE_DATE,CLIENT_CATEGORY_ID,CLIENT_CLASS_ID,DESCRIPTION) values(now(), now(), ?, ?, ?)";
					$q = $pdo->prepare($sql);
					$q->execute(array($CLIENT_CATEGORY,$CLIENT_CLASS,$DESCRIPTION));					
					Database::disconnect();
					echo '<script type="text/javascript">
						window.location.href = "clientClassification.php";
						</script>';
					
				}			
			}
		ob_end_flush();