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
		var fname = document.getElementById("DEPARTMENT_NAME");
		
		//var lname = document.getElementById("RI_CODE");
		//alert(success);
		if(fname.value.trim() == ''){
			valid = false;
			message = message + '*Department is required' + '\n';
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
                                            <h3>Department</h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="department.php">
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
			$DEPARTMENT_NAME = $_POST['DEPARTMENT_NAME'];
			$DESCRIPTION = $_POST['DESCRIPTION'];
			// query
			     $pdo = Database::connect();
				$sql = "SELECT * FROM DEPARTMENT WHERE DEPARTMENT_NAME = '$DEPARTMENT_NAME' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    
					    echo "<div class='alert alert-info'> Department<'$DEPARTMENT_NAME' > already exists. No update done... </div>";
						
					
                 }
			  
		    else{
			$sql = "UPDATE DEPARTMENT 
					SET CREATED_DATE= NOW(), LAST_UPDATE_DATE= NOW(), DEPARTMENT_NAME=?, DESCRIPTION=?
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($DEPARTMENT_NAME,$DESCRIPTION,$ID));
			
			echo "<div class='alert alert-success' 	id='success'> Successfully Updated. </div>";
         
						
			echo '<script type="text/javascript">
			window.location.href = "department.php";
			</script>';
		  
		}	
			
		}	
			$ID = $_GET['id']; /** get the DEPARTMENT ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM DEPARTMENT WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
	
	
			
		?>
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Department</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span1"><label>Code</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span1"></div>
                                <!--<div class="span3"><label>Last Update Date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE'];?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span4"></div>-->
                                <div class="span3"><label>Department<font color="#FF0000"> *</font></label><input type="text" autofocus  value="<?php echo $row['DEPARTMENT_NAME'];?>" name="DEPARTMENT_NAME" id="DEPARTMENT_NAME" class="span3"></div>
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
							   
							    <a href="department.php" class="btn btn-default">
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

