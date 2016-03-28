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
	 <link rel="stylesheet" type="text/css" href="../../resources/css/pikaday.css">	 
	<link rel="stylesheet" type="text/css" href="../../resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../resources/css/jquery_ui_datepicker.css">
	
	<script src="../../resources/js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="../../resources/js/jquery_ui_datepicker.js" type="text/javascript"></script>
	
	<script src="../../resources/js/ui.datepicker-de.js" type="text/javascript"></script>
	<script src="../../resources/js/timepicker.js" type="text/javascript"></script>
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
		function Validate(){
	var valid = true;
	var message = '';
	var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var EmployeeName = document.getElementById("EMP_NAME");
	var Emailid = document.getElementById("EMAIL_ID");
    var MobileNum= document.getElementById("MOBILE_NUM");		
	var Designation = document.getElementById("DESIGNATION_ID");
	var Department = document.getElementById("DEPARTMENT_ID");
	var Active = document.getElementById("active");
	var Manager= document.getElementById("MANAGER_DESG_ID");
	/*var SendEmailId1 = document.getElementById("SEND_EMAIL_ID1");
	var SendEmailId2= document.getElementById("SEND_EMAIL_ID2");	
	var SendEmailId3 = document.getElementById("SEND_EMAIL_ID3");
	var SendEmailId4 = document.getElementById("SEND_EMAIL_ID4");
	var SendEmailId5 = document.getElementById("SEND_EMAIL_ID5");
	var SendEmailId6= document.getElementById("SEND_EMAIL_ID6");*/
	
	if( EmployeeName.value.trim() == ''){
		valid = false;
		message = message + '*Employee Name is required' + '\n';
	}
	if(Emailid.value.trim() == ''){
		valid = false;
		message = message + '*Email Id is required' + '\n';
	}
	if (!Emailid.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Emailid Not a valid ' + '\n';
	}
	if(MobileNum.value.trim() == ''){
		valid = false;
		message = message + '*Mobile Number is required' + '\n';
	}
	if(!MobileNum.value.match(/^[1-9]{1}[0-9]{9}$/)){
		valid = false;
		
		message = message + '*Enter valid mobile number' + '\n';
	}
	
       if(Designation.value == '-- SELECT --'){
		valid = false;
		message = message + '*Designation is required' + '\n';
	}
	   if(Department.value == '-- SELECT --'){
		valid = false;
		message = message + '*Department is required' + '\n';
	}
	   if(Active.value == '-- SELECT --'){
		valid = false;
		message = message + '*Active is required' + '\n';
	}
	  if(Manager.value == '-- SELECT --'){
		valid = false;
		message = message + '*Manager is required' + '\n';
	}
	 
	 /*if (!SendEmailId1.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Send EmailId1 Not a valid' + '\n';
	}
	
	if (!SendEmailId2.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Send EmailId2 Not a valid ' + '\n';
	}
	
	if (!SendEmailId3.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '* Send EmailId3 Not a valid ' + '\n';
	}
	
	if (!SendEmailId4.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Send EmailId4 Not a valid ' + '\n';
	}
	
	if (!SendEmailId5.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Send EmailId5 Not a valid' + '\n';
	}
	
	if (!SendEmailId6.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		message = message + '*Send EmailId6 Not a valid ' + '\n';
	}*/
	if (valid == false){
		alert(message);
		return false;
	}
		}
$(function() {
				  $('.pickerfield').datetime({
									userLang	: 'en',
									americanMode: true,
								});
			});

function validateEmail1(){
var valid=true;
var SendEmailId1 = document.getElementById("SEND_EMAIL_ID1");
if(SendEmailId1.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId1.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*First Level Email Id Not valid' );
	}
	}
}
function validateEmail2(){
var valid=true;
var SendEmailId2= document.getElementById("SEND_EMAIL_ID2");
if(SendEmailId2.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId2.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*Second Level Email Id Not valid' );
	}
	}
}
function validateEmail3(){
var valid=true;
var SendEmailId3 = document.getElementById("SEND_EMAIL_ID3");
if(SendEmailId3.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId3.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*Third Level Email Id Not valid' );
	}
	}
}
function validateEmail4(){
var valid=true;
var SendEmailId4 = document.getElementById("SEND_EMAIL_ID4");
if(SendEmailId4.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId4.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*Fourth Level Email Id Not valid' );
	}
	}
}
function validateEmail5(){
var valid=true;
var SendEmailId5 = document.getElementById("SEND_EMAIL_ID5");
if(SendEmailId5.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId5.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*Fifith Level Email Id Not valid' );
	}
	}
}
function validateEmail6(){
var valid =true;
var SendEmailId6 = document.getElementById("SEND_EMAIL_ID6");
if(SendEmailId6.value.trim() == ''){
		valid = false;
	
	}
	if(valid){
 if (!SendEmailId6.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		alert('*Sixth Level Email Id Not valid' );
	}
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
                                            <h3>Employee</h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="employee.php">
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
      		
			$EMP_NAME = $_POST['EMP_NAME'];
			    $DESIGNATION_ID = $_POST['DESIGNATION_ID'];
			    $MOBILE_NUM = $_POST['MOBILE_NUM'];
			    $EMAIL_ID = $_POST['EMAIL_ID'];
			    $DEPARTMENT_ID = $_POST['DEPARTMENT_ID'];
			    $ACTIVE =$_POST['ACTIVE'];
			    $MANAGER_DESG_ID = $_POST['MANAGER_DESG_ID'];
			    $DEVICE_ACTIVE_DATE = $_POST['DEVICE_ACTIVE_DATE'];
			    $SEND_EMAIL_ID1 = $_POST['SEND_EMAIL_ID1'];
			    $SEND_EMAIL_ID2 = $_POST['SEND_EMAIL_ID2'];
				$SEND_EMAIL_ID3 = $_POST['SEND_EMAIL_ID3'];
				$SEND_EMAIL_ID4 = $_POST['SEND_EMAIL_ID4'];
				$SEND_EMAIL_ID5 = $_POST['SEND_EMAIL_ID5'];
				$SEND_EMAIL_ID6 = $_POST['SEND_EMAIL_ID6'];	
				
				
			// query
			   $pdo = Database::connect();
				$sql = "SELECT * FROM EMP_DETAILS WHERE EMAIL_ID = '$EMAIL_ID' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	    echo "<div class='alert alert-info'> Email Id<'$EMAIL_ID '> already exists. No update done.... </div>";
						
				
                 }
			  
		    else{
			$sql = "UPDATE EMP_DETAILS 
					SET CREATED_DATE= NOW(), EMP_NAME=? ,DESIGNATION_ID=? ,MOBILE_NUM=? ,EMAIL_ID=? ,DEPARTMENT_ID=? ,ACTIVE=? ,MANAGER_DESG_ID=? ,DEVICE_ACTIVE_DATE=? ,SEND_EMAIL_ID1=? ,SEND_EMAIL_ID2=? ,SEND_EMAIL_ID3=? ,SEND_EMAIL_ID4=? ,SEND_EMAIL_ID5=? ,SEND_EMAIL_ID6=? 
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($EMP_NAME,$DESIGNATION_ID,$MOBILE_NUM,$EMAIL_ID,$DEPARTMENT_ID,$ACTIVE,$MANAGER_DESG_ID,$DEVICE_ACTIVE_DATE,$SEND_EMAIL_ID1,$SEND_EMAIL_ID2,$SEND_EMAIL_ID3,$SEND_EMAIL_ID4,$SEND_EMAIL_ID5,$SEND_EMAIL_ID6,$ID));
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			
			echo '<script type="text/javascript">
				window.location.href = "employee.php";
				</script>';
		}	
			
		}	
			$ID = $_GET['id']; /** get the EMP_DETAILS ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM EMP_DETAILS WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
							
						
					?>						
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Employee</h3>
							</div>
							<div class="widget-content">							                              
								<div class="span4"><label>Employee Name<font color="#FF0000"> *</font></label><input type="text"  value="<?php echo $row['EMP_NAME'];?>" name="EMP_NAME"  id="EMP_NAME" class="span4"></div>								
																
								<div class="span4"><label>Email Id<font color="#FF0000"> *</font></label><input type="text" name="EMAIL_ID"  value="<?php echo $row['EMAIL_ID'];?>" id="EMAIL_ID" onblur="validateEmail()" class="span4"></div>   
								<div class="span3"><label>Mobile Num<font color="#FF0000"> *</font></label><input type="text" maxlength="10" value="<?php echo $row['MOBILE_NUM'];?>"  name="MOBILE_NUM" id="MOBILE_NUM" onblur="validateForm()" class="span3"></div>
								<div class="span4"><label>Designation<font color="#FF0000"> *</font></label>										 
								<?php 
										
										
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESIGNATION_NAME,DESCRIPTION FROM DESIGNATION");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="DESIGNATION_ID" id="DESIGNATION_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $rowcat = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>			
												<option value="<?php  echo $rowcat['ID']; echo '" '; if($rowcat['ID'] == $row['DESIGNATION_ID']) { echo 'selected'; } ?> "><?php  echo $rowcat['DESIGNATION_NAME'];?>( <?php  echo $rowcat['DESCRIPTION'];?> ) </option>  
																										    
											<?php } echo '</select>';  ?>
								</div>
								<div class="span7"><label>Department<font color="#FF0000"> *</font></label>
								<?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DEPARTMENT_NAME,DESCRIPTION FROM DEPARTMENT");
											$result->execute();
											
											echo '<select class="span7" name="DEPARTMENT_ID" id="DEPARTMENT_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $rowdep = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								   ?>		
								        			
										<option value="<?php  echo $rowdep['ID']; echo '" '; if($rowdep['ID'] == $row['DEPARTMENT_ID']) { echo 'selected'; } ?> "><?php  echo $rowdep['DEPARTMENT_NAME'];?>( <?php  echo $rowdep['DESCRIPTION'];?> ) </option>  
															    
											<?php } echo '</select>';  ?>
								</div>
								
								<div class="span4"><label>Manager<font color="#FF0000"> *</font></label>
								<?php 
										
										
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESIGNATION_NAME,DESCRIPTION FROM DESIGNATION");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="MANAGER_DESG_ID" id="MANAGER_DESG_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $rowmag = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>			
								<option value="<?php  echo $rowmag['ID']; echo '" '; if($rowmag['ID'] == $row['DESIGNATION_ID']) { echo 'selected'; } ?> "><?php  echo $rowmag['DESIGNATION_NAME'];?>( <?php  echo $rowmag['DESCRIPTION'];?> ) </option>  
											
									<?php } echo '</select>';  ?>
								</div>
								<div class="span4"><label>Active<font color="#FF0000"> *</font></label>
								
                                <select name="ACTIVE" id="active" class="span4">
								<?php if($row['ACTIVE']=='Y'):?>
								<option value="Y" selected>Y</option>
								<option value="N">N</option>
								<?php else: ?>
								<option value="Y">Y</option>
								<option value="N" selected>N</option>
								<?php endif; ?>
								</select>
								</div>
								
                               
							    <div class="span3"><label>First Level Email Id </label><input type="text" value="<?php echo $row['SEND_EMAIL_ID1'];?>" name="SEND_EMAIL_ID1" id="SEND_EMAIL_ID1" onblur="validateEmail1()" class="span3"></div>
								<div class="span4"><label>Second Level Email Id </label><input type="text" value="<?php echo $row['SEND_EMAIL_ID2'];?>" name="SEND_EMAIL_ID2" id="SEND_EMAIL_ID2" onblur="validateEmail2()" class="span4"></div>
								<div class="span4"><label>Third Level Email Id </label><input type="text" value="<?php echo $row['SEND_EMAIL_ID3'];?>" name="SEND_EMAIL_ID3" id="SEND_EMAIL_ID3" onblur="validateEmail3()" class="span4"></div>
								
								<div class="span3"><label>Fourth Level Email Id </label><input type="text" value="<?php echo $row['SEND_EMAIL_ID4'];?>" name="SEND_EMAIL_ID4" id="SEND_EMAIL_ID4" onblur="validateEmail4()" class="span3"></div>
								<div class="span4"><label>Fifith Level Email Id </label><input type="text" value="<?php echo $row['SEND_EMAIL_ID5'];?>" name="SEND_EMAIL_ID5" id="SEND_EMAIL_ID5" onblur="validateEmail5()" class="span4"></div>
								<div class="span4"><label>Sixth Level Email Id </label><input type="text"  value="<?php echo $row['SEND_EMAIL_ID6'];?>" name="SEND_EMAIL_ID6" id="SEND_EMAIL_ID6" onblur="validateEmail6()" class="span4"></div>
								
                                  
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Update" value="Update" class="btn btn-success span3 " /></div>		
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
							   
							    <a href="employee.php" class="btn btn-default">
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
