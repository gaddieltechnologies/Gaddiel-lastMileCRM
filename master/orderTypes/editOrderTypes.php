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
	var fname = document.getElementById("ORDER_TYPE");
	//var lname = document.getElementById("RI_CODE");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*Order Types is required' + '\n';
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

	<!-- /Navbar -->
	
	 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
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
                                            <h3>Order Types</h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="orderTypes.php">
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
			 if ( !empty($_POST)) {
	
			$ID =$_GET['id'];
			//$LAST_UPDATE_DATE = $_GET['LAST_UPDATE_DATE'];
			$ORDER_TYPE = $_POST['ORDER_TYPE'];
			$DESCRIPTION = $_POST['DESCRIPTION'];
			// query
			 $pdo = Database::connect();
				$sql = "SELECT * FROM ORDER_TYPES WHERE ORDER_TYPE = '$ORDER_TYPE' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	 echo "<div class='alert alert-info'>  Order Types<'$ORDER_TYPE'> already exists. No update done. </div>";
						 

                 }
			  
		    else{
			$sql = "UPDATE ORDER_TYPES 
					SET LAST_UPDATE_DATE= NOW(), CREATED_DATE= NOW(), ORDER_TYPE=?, DESCRIPTION=?
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($ORDER_TYPE,$DESCRIPTION,$ID));
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			echo '<script type="text/javascript">
			window.location.href = "orderTypes.php";
			</script>';
		}	
		}
			ob_start();
			$ID = $_GET['id']; /** get the ORDER_TYPE ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM ORDER_TYPES WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
	
	
			
		?>
					
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Order Types</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span1"><label>Code</label><input type="text" value="<?php echo $row['ID'];?>" name="ID""<?php echo $row['ID'];?>" disabled="disabled"  class="span1"></div>
                                <div class="span3 hidefields"><label>Last Update Date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE'];?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>
                                <div class="span3"><label>Order Types<font color="#FF0000"> *</font></label><input type="text" autofocus  value="<?php echo $row['ORDER_TYPE'];?>" name="ORDER_TYPE" id="ORDER_TYPE" class="span3"></div>
                                <div class="span4"><label>Description</label><input type="text" value="<?php echo $row['DESCRIPTION'];?>" name="DESCRIPTION"  class="span4"></div>
                                    
                                   
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
							   
								
							    <a href="orderTypes.php" class="btn btn-default">
								<img src="../../resources/images/e-close.png"/><br>Close</a>		
						    </div>   
						</center> 	
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