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
	
	/*var SendEmailId2= document.getElementById("SEND_EMAIL_ID2");	
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

	if (valid == false){
		alert(message);
		return false;
	}
}

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
function addDate(){
					
		var mydate= new Date();
		var month = mydate.getMonth()+1;
		var day = mydate.getDate();
		var year = mydate.getFullYear().toString();
		 var hour = mydate.getHours(); // => 9
		 var min = mydate.getMinutes(); // =>  30
		 //var sec = mydate.getSeconds(); // => 51

		
		if (document.getElementById('DEVICE_ACTIVE_DATE').value == ''){
		document.getElementById('DEVICE_ACTIVE_DATE').value = year + '-' + month + '-' + day +' '+ hour + ':'+ min;
		}
		
}
$(function() {
				  $('.pickerfield').datetime({
									userLang	: 'en',
									americanMode: true,
								});
			});
</script>
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>

<body onload="addDate();">
<style>

</style>
<!-- Navbar -->
    
	<?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	<!-- /Navbar -->
	<form name="myForm" action="addEmployee.php" method="POST"  onSubmit="return Validate();">
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
						<div class="widget">
							<div class="widget-header">
								<h3>Add Employee</h3>
							</div>
							<div class="widget-content">							                              
                                <div class="span4"><label>Employee Name<font color="#FF0000"> *</font></label><input type="text"  value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="EMP_NAME"  id="EMP_NAME" class="span4"></div>								
								<div class="span4"><label>Email Id<font color="#FF0000"> *</font></label><input type="text" name="EMAIL_ID" id="EMAIL_ID" onblur="validateEmail()" class="span4"></div>   
								<div class="span3"><label>Mobile Num<font color="#FF0000"> *</font></label><input type="text" maxlength="10"  name="MOBILE_NUM" id="MOBILE_NUM" onblur="validateForm()" class="span3"></div>
								<div class="span4"><label>Designation<font color="#FF0000"> *</font></label>										 
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESIGNATION_NAME,DESCRIPTION FROM DESIGNATION");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="DESIGNATION_ID" id="DESIGNATION_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['DESIGNATION_NAME'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
								</div>
								
								
								<div class="span7"><label>Department<font color="#FF0000"> *</font></label>
								<?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DEPARTMENT_NAME,DESCRIPTION FROM DEPARTMENT");
											$result->execute();
											
											echo '<select autofocus  class="span7" name="DEPARTMENT_ID" id="DEPARTMENT_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								   ?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['DEPARTMENT_NAME'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
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
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['DESIGNATION_NAME'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
								</div>
	                        	
                                 <div class="span4"><label>Active<font color="#FF0000"> *</font></label>
								<select name="ACTIVE" class="span4" id="active">
								<option>-- SELECT --</option>
								<option>Y</option>
								<option>N</option></select>
								</div> 
								
                               
							    <div class="span3"><label>First Level Email Id </label><input type="text"  name="SEND_EMAIL_ID1" id="SEND_EMAIL_ID1" onblur="validateEmail1()" class="span3"></div>
								<div class="span4"><label>Second Level Email Id </label><input type="text" name="SEND_EMAIL_ID2" id="SEND_EMAIL_ID2" onblur="validateEmail2()" class="span4"></div>
								<div class="span4"><label>Third Level Email Id</label><input type="text" name="SEND_EMAIL_ID3" id="SEND_EMAIL_ID3" onblur="validateEmail3()" class="span4"></div>
								
								<div class="span3"><label>Frouth Level Email Id</label><input type="text" name="SEND_EMAIL_ID4" id="SEND_EMAIL_ID4" onblur="validateEmail4()" class="span3"></div>
								<div class="span4"><label>Fifith Level Email Id</label><input type="text" name="SEND_EMAIL_ID5" id="SEND_EMAIL_ID5" onblur="validateEmail5()" class="span4"></div>
								<div class="span4"><label>Sixth Level Email Id </label><input type="text" name="SEND_EMAIL_ID6" id="SEND_EMAIL_ID6" onblur="validateEmail6()" class="span4"></div>
								
                                  
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span3 "  /></div>		
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
	</div>	
    </form>		
</body>


</html>
<?php
			 //include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); 
            include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/classes/class.phpmailer.php'); 
		    if ( !empty($_POST))
			{
		    	//$EmployeeCode = $_POST['EmployeeCode'];
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
				
			
			     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM EMP_DETAILS WHERE EMAIL_ID = '$EMAIL_ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Email ID already exits.')</script>";
                 }
			  
		    else{
				$pVEmailId  = $EMAIL_ID;
				
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              	$sql = "INSERT INTO EMP_DETAILS (CREATED_DATE,EMP_NAME,DESIGNATION_ID,MOBILE_NUM,EMAIL_ID,DEPARTMENT_ID,ACTIVE,MANAGER_DESG_ID,DEVICE_ACTIVE_DATE,SEND_EMAIL_ID1,SEND_EMAIL_ID2,SEND_EMAIL_ID3,SEND_EMAIL_ID4,SEND_EMAIL_ID5,SEND_EMAIL_ID6) 
values(now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($EMP_NAME,$DESIGNATION_ID,$MOBILE_NUM,$EMAIL_ID,$DEPARTMENT_ID,$ACTIVE,$MANAGER_DESG_ID,$DEVICE_ACTIVE_DATE,$SEND_EMAIL_ID1,$SEND_EMAIL_ID2,$SEND_EMAIL_ID3,$SEND_EMAIL_ID4,$SEND_EMAIL_ID5,$SEND_EMAIL_ID6));
				Database::disconnect();	
			
        		
			
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
				
               	header('Location:employee.php');
				ob_end_flush();
                 exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>