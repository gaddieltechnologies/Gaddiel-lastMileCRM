<?php
ob_start();
?>
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
     <script type="text/javascript">
   function Validate(){
	var valid = true;
	var message = '';
	var fname = document.getElementById("CLIENT_CATEGORY");
	//var lname = document.getElementById("RI_CODE");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*Client Category is required' + '\n';
	}
	if (valid == false){
		alert(message);
		return false;
	}
}

  
</script>	
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
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
									<h3>Client Category </h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
										
									</div>  
									<div class="box-holder">
											
											 
									</div>  
									<div class="box-holder">
										<a href="clientCategory.php">
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
								<h3>Add Client Category</h3>
							</div>
							<div class="widget-content">							   
                                 <!--<div class="span3"><label>ClientCategory ID</label><input type="text" name="ID" disabled="disabled"  class="span3"></div>
                               <div class="span3"><label>Last Update Date</label><input type="text"  name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>-->
                                <div class="span4"><label>Client Category<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo !empty($CLIENT_CATEGORY)?$CLIENT_CATEGORY:'';?>" name="CLIENT_CATEGORY" id="CLIENT_CATEGORY" class="span4"></div>
                                <div class="span4"><label>Description</label><input type="text" value="<?php echo !empty($DESCRIPTION)?$DESCRIPTION:'';?>" name="DESCRIPTION"  class="span4"></div>
                                    
                                   
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span3" /></div>		
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
													
													
													<a href="clientCategory.php" class="btn btn-default">
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
</body>
</html>
<?php
				
				 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
               if ( !empty($_POST))
			{				
            	$CLIENT_CATEGORY = $_POST['CLIENT_CATEGORY'];
				$DESCRIPTION = $_POST['DESCRIPTION'];
				 $valid = true;
    
        $pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_CATEGORY WHERE CLIENT_CATEGORY = '$CLIENT_CATEGORY'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Client Category already exits.')</script>";
                 }
			  
		    else{
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO CLIENT_CATEGORY (CREATED_DATE,LAST_UPDATE_DATE,CLIENT_CATEGORY,DESCRIPTION) values(now(), now(), ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($CLIENT_CATEGORY ,$DESCRIPTION));
                Database::disconnect();
	   			header('Location:clientCategory.php');
				ob_end_flush();
                 exit;
		    }			
			}
			ob_end_flush();
		?>	
			