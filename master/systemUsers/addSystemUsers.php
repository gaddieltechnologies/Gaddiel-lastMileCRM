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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	
	<!-- /Navbar -->
	<form action="addSystemUsers.php" method="POST" onSubmit="return Validate();">
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
                                            <h3>System Users </h3>	
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
						<div class="widget">
							<div class="widget-header">
								<h3>Add System Users</h3>
							</div>
							<div class="widget-content">							   
                                <!--<div class="span3"><label>Schedule Periods Code</label><input type="text"  name="ID" disabled="disabled"  class="span3"></div>-->
                                <div class="span3"><label>Name<font color="#FF0000"> *</font></label><input type="text" autofocus name="USER_NAME" id="USER_NAME" class="span3"></div>
                                <div class="span3"><label>Email Id<font color="#FF0000"> *</font></label><input type="text"  value="<?php echo !empty($EMAIL_ID)?$EMAIL_ID:'';?>" name="EMAIL_ID" id="EMAIL_ID" class="span3"></div>
                                <div class="span3"><label>Password<font color="#FF0000"> *</font></label><input type="password" value="<?php echo !empty($PASSWORD)?$PASSWORD:'';?>" name="PASSWORD" id="PASSWORD" class="span3"></div>
                                    
                                   
                               	<div class="span2"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span2" /></div>		
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
</body>

</html>
<?php
			
			include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); 
           
		    if ( !empty($_POST))
			{
		    	$USER_NAME = $_POST['USER_NAME'];
				$EMAIL_ID = $_POST['EMAIL_ID'];
				$PASSWORD = $_POST['PASSWORD'];				
				
				     $valid = true;
                    $pdo = Database::connect();
				$sql = "SELECT * FROM SYSTEM_USERS WHERE EMAIL_ID = '$EMAIL_ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Email Id already exits.')</script>";
                 }
			  
		    else{
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO SYSTEM_USERS (CREATED_DATE,LAST_UPDATE_DATE,USER_NAME,EMAIL_ID,PASSWORD) values(now(), now(), ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($USER_NAME,$EMAIL_ID ,$PASSWORD));
                Database::disconnect();
                echo "<div class='alert alert-info'> Successfully Inserted. </div>";				
                header('Location:systemUsers.php');
				ob_end_flush();
                exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>