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
	var fname = document.getElementById("USER_NAME");
	var lname = document.getElementById("EMAIL_ID");
	var pname = document.getElementById("PASSWORD");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*User name is required' + '\n';
	}
	if(lname.value.trim() == ''){
		valid = false;
		message = message + '*Email Id is required' + '\n';
	}
	if(pname.value.trim() == ''){
		valid = false;
		message = message + '*Password is required' + '\n';
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
                                            <h3>System Users</h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="systemUsers.php">
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
			$USER_NAME = $_POST['USER_NAME'];
			$EMAIL_ID = $_POST['EMAIL_ID'];
			$PASSWORD = $_POST['PASSWORD'];
			// query
			     $pdo = Database::connect();
				$sql = "SELECT * FROM SYSTEM_USERS WHERE EMAIL_ID = '$EMAIL_ID' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    
					    echo "<div class='alert alert-info'> Email Id<'$EMAIL_ID' > already exists. No update done... </div>";
						
					
                 }
			  
		    else{
			$sql = "UPDATE SYSTEM_USERS 
					SET CREATED_DATE= NOW(), LAST_UPDATE_DATE= NOW(),USER_NAME=?, EMAIL_ID=?, PASSWORD=?
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($USER_NAME,$EMAIL_ID,$PASSWORD,$ID));
			
			echo "<div class='alert alert-success' 	id='success'> Successfully Updated. </div>";
         
						
			echo '<script type="text/javascript">
			window.location.href = "systemUsers.php";
			</script>';
		  
		}	
			
		}	
			$ID = $_GET['id']; /** get the VISIT_EMAIL_IDS ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM SYSTEM_USERS WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
	
	
			
		?>
						<div class="widget">
							<div class="widget-header">
								<h3>Edit System Users</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span3"><label>Name<font color="#FF0000"> *</font></label><input type="text" autofocus  value="<?php echo $row['USER_NAME'];?>" name="USER_NAME" id="USER_NAME" class="span3"></div>
                                <div class="span3"><label>Email Id<font color="#FF0000"> *</font></label><input type="text"  value="<?php echo $row['EMAIL_ID'];?>" name="EMAIL_ID" id="EMAIL_ID" class="span3"></div>
                                <div class="span3"><label>Password<font color="#FF0000"> *</font></label><input type="password" value="<?php echo $row['PASSWORD'];?>" name="PASSWORD" id="PASSWORD" class="span3"></div>
                                        
                                   
                               	<div class="span2"><label>&nbsp;</label><input type="submit" name="update" value="Update" class="btn btn-success span2" /></div>		
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
							   
							    <a href="systemUsers.php" class="btn btn-default">
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

