<!-- saved from url=(0057)http://wbpreview.com/previews/WB01BG165/user-account.html -->
<?php

?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>crM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
   
	<!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="resources/css/font-awesome.css">
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>

<body>
	
	<!-- Navbar -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LAST MILE CRM</a>
				<div class="nav-collapse">
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- /Navbar -->
	
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
		
		<div class="span12">				
				
					<div class="widget-content">
					
					<div class="span6 desktop">	
						<div class="widget">	
							<div class="widget-header ">
								<h3>To Register and Subscribe:</h3>
							</div>	
							
							<div class="widget-content">
							    <div class="span2"><label>First Name<font color="#FF0000"> *</font></label></div>							
							    <div class="span3"><input type="text"  value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="EMP_NAME"  id="EMP_NAME" class="span3"></div>
							    <div class="span2"><label>Last Name<font color="#FF0000"> *</font></label></div>
                                <div class="span3"><input type="text"  value="<?php echo !empty($DESIGNATION_ID)?$DESIGNATION_ID:'';?>" name="DESIGNATION_ID"  id="DESIGNATION_ID" class="span3"></div>						
								<div class="span2"><label>Company Name<font color="#FF0000"> *</font></label></div>
								<div class="span3"><input type="text" value="<?php echo !empty($DEPARTMENT_ID)?$DEPARTMENT_ID:'';?>" name="DEPARTMENT_ID" id="DEPARTMENT_ID" class="span3"></div>
								<div class="span2"><label>Email Id<font color="#FF0000"> *</font></label></div>
								<div class="span3"><input type="text" name="EMAIL_ID" id="EMAIL_ID" onblur="validateEmail()" class="span3"></div>
								<div class="span2"><label>Mobile Number<font color="#FF0000"> *</font></label></div>
								<div class="span3"><input type="text" maxlength="10"  name="MOBILE_NUM" id="MOBILE_NUM" onblur="validateForm()" class="span3"></div>
								<div class="span2"><label>Job Position<font color="#FF0000"> *</font></label></div>
								<div class="span3"><input type="text" value="<?php echo !empty($MANAGER_DESG_ID)?$MANAGER_DESG_ID:'';?>" name="MANAGER_DESG_ID" id="MANAGER_DESG_ID" class="span3"></div>   
							   
							    <div class="span6">
									<p class="submit"><input type="Sign Up" name="commit" value="Sign Up" class="btn btn-success span3"></p>
								</div>
							</div>	
						</div>
					</div>
						<div class="span5 pull-right">			
							<div class="widget">
								<div class="widget-header ">
									<h3>Member Login</h3>
								</div>								
								<div class="widget-content">
									<form method="post" action="">
									
									<div class="span1"><label>Username</label></div>
									  <div class="span3"><input type="text" name="USER_NAME" value="" placeholder="Username" class="span3" autofocus></div>
									<div class="span1"><label>Password</label></div>									  
									  <div class="span3"><input type="password" name="PASSWORD" value="" placeholder="Password"  class="span3"></div>
									<div class="span5">
									<p class="remember_me">
										<label class="checkbox " >
											<input type="checkbox" name="remember_me" id="remember_me">
											Remember me on this computer
										</label>
									</p>
									</div>
									<div class="span5">
									<p class="submit"><input type="submit" name="commit" value="Login" class="btn btn-success span3"></p>
									</div>
								</form>
								</div>
								
				<?php
		
				if ( !empty($_POST))
				{				
				 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
					$USER_NAME = $_POST['USER_NAME'];
					$PASSWORD = $_POST['PASSWORD'];					
					$pdo = Database::connect();
					$sql = "SELECT * FROM SYSTEM_USERS WHERE EMAIL_ID = '$USER_NAME' and PASSWORD= '$PASSWORD'";
					$query =  $pdo->prepare( $sql );
					$query->execute();
				   $row = $query->fetch();
				   $USER_NAME = $row[ 'USER_NAME' ];				 
					//$_SESSION['USER_NAME']=$USER_NAME;
					
					if($row > 0) {
						
						echo '<script type="text/javascript">
						window.location.href = "dashBoard.php";
						</script>';
					}
					
					else{
					   	echo "<div class='alert alert-danger'>  Authentication Failed.   Enter correct Authentication Details </div>";
					}
			
				
				}
			?> 		
							</div>		

							<div class="span5 pull-right">	
							<div class="widget">				
								<div id="footer">
									<i>Powered by</i> 
									<div class="widget-content">
											
										<img src="gaddielsticker.jpg" Width="400px" />	
									</div>
								</div>
							</div>
						</div>	
					</div>			 
				</div>
			</div>	
			
		   		
		</div>
		</br>
		<div class="row">
			<div class="span12 ">
				<div class="widget-content">
			      <div class="widget">	
					<div class="widget-header ">
						<h3>Latest News & Updates</h3>
					</div>
					<div class="widget-content" >						
						<p >GADDIEL is a global Information Technology (IT) company founded by IT service professionals with decades of deep software development, product design, solution architecture and business intelligence experience in varied technologies and domains.

Our delivery model provides for an integrated, highly flexible mix of on-site and off-site delivery options to highly valued customers.
</p>
					</div>
					
				</div>			
			</div>	
		
		   </div>			
		</div>
			
			<!-- Footer -->
			<div id="footer">
				<hr>
				<p class="pull-right"><a href="http://www.gaddieltech.com" >Gaddiel Technologies Pvt Ltd </a> &copy; 2014</p>
			</div>
			<!-- /Footer -->
	
		</div>
		<!-- /Container -->
	</div>
	<!-- /Main content -->

	<!-- Javascript files -->
	


</body></html>