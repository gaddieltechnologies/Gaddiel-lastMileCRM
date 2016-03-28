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
    <!-- Google font -->
    
		<script type="text/javascript">
	/* <![CDATA[ */
		$(function() {
				  $('.pickerfield').datetime({
									userLang	: 'en',
									americanMode: true,
								});
			});
	/* ]]> */
	
		</script>	
	<script src="../../resources/js/ui.datepicker-de.js" type="text/javascript"></script>
	<script src="../../resources/js/timepicker.js" type="text/javascript"></script>
<script type="text/javascript">
function Validate(){

	var valid = true;
	var message = '';
	var appointment = document.getElementById("appointments");
	
		
	if(appointment.value == '-- SELECT --'){
		valid = false;
		//message = message + '*Client Classification is required' + '\n';
		window.alert("*Appointments is required");
	}

		if (valid == false){
		return false;
	}
	
}
function validateEmail(){
var EmailId= document.getElementById("email");	
	
	if (!Emailid.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    	valid = false;
		window.alert("Please enter a valid e-mail address");
	}
	}
</script>
<script type="text/javascript">
function clearvalue()
{


 document.getElementById("attendees").value="";
 document.getElementById("customerComments").value="";
 document.getElementById("employeeComments").value="";
 document.getElementById("follow_up").value="";
 document.getElementById("email").value="";

 }
 	function addDate(){
					
		var mydate= new Date();
		var month = mydate.getMonth()+1;
		var day = mydate.getDate();
		var year = mydate.getFullYear().toString();
		 var hour = mydate.getHours(); // => 9
		 var min = mydate.getMinutes(); // =>  30
		 //var sec = mydate.getSeconds(); // => 51

		
		if (document.getElementById('ActualDate').value == ''){
		document.getElementById('ActualDate').value = year + '-' + month + '-' + day +' '+ hour + ':'+ min;
		}
}
</script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
<body onload="addDate();">
<style>

</style>
<!-- Navbar -->
    
	
	<!-- /Navbar -->
	<form action="addEnterVisitReports.php" method="POST"  onSubmit="return Validate();" enctype="multipart/form-data">
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
									<h3>Visit Reports</h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
											
									</div>  
									<div class="box-holder">
												
												 
									</div>  
									<div class="box-holder">
										<a href="enterVisitReports.php">
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
								<h3>Add Visit Report</h3>
							</div>
							<div class="widget-content">							                              
                                <div class="span11"><label>Appointments with<font color="#FF0000">*</font>(Client Name,Employee Name,Visit Date,Purpose Name)</label>
								 <?php 
										 
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT clapp.ID ID,clt.ID CLIENT_ID,emp.ID EMPLOYEE_ID, clt.CLIENT_NAME CLIENT_NAME,emp.EMP_NAME EMP_NAME,clapp.APPT_DATETIME APPT_DATETIME, visit.PURPOSE_NAME PURPOSE_NAME
											FROM CLIENT_APPOINTMENTS clapp, CLIENT_DETAILS clt, EMP_DETAILS emp, VISIT_PURPOSES visit
											WHERE clt.ID=clapp.CLIENT_ID AND emp.ID=clapp.EMPLOYEE_ID AND visit.ID=clapp.VISIT_PURPOSE_ID");
											$result->execute();
											
											echo '<select class="span11" name="APPOINTMENTS" id="appointments" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['CLIENT_NAME'];?>,<?php  echo $row['EMP_NAME'];?>,<?php  echo $row['APPT_DATETIME'];?>,<?php  echo $row['PURPOSE_NAME'];?> </option>						    
											<?php } echo '</select>';  ?>		
								</div>														
								<div class="span3"><label>Actual Visit Date Time<font color="#FF0000"> *</font></label><input type="text" value="" name="ActualDate"  id="ActualDate" class="span3 pickerfield"></div>	
								<div class="span3"><label>Attendees</label><input type="text" value="" name="attendees" id="attendees" class="span3"></div>		

								<div class="span5"><label>Additional Email Id's (ex : ****@gmail.com;****@yahoo.com)</label><input type="text" value="" name="Email"  id="email" onblur="validateEmail()" class="span5"> </div> 	
								<div class="span11"><label>Customer Comments</label><textarea value="" name="CustomerComments" id="customerComments"  class="span11 form-control"></textarea></div>
								<div class="span11"><label>Employee Comments</label><textarea value="" name="EmployeeComments" id="employeeComments" onblur="validateForm()"  class="span11 form-control"></textarea></div>
								<div class="span11"><label>Follow-up Points</label><textarea value="" name="Follow_up" id="follow_up" onblur="validateForm()"  class="span11"></textarea></div>	
                            	<div class="span6"><label>&nbsp;</label><input type="hidden" name="MAX_FILE_SIZE" value="16000000">
                                <input name="userfiles" type="file" id="userFile" class="span6"></div>	     
                               	
								<div class="span5"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span3 " /></div>	

							</div>                
						</div>
					</div>
				<!-- /Content -->
                </div>
	<?php
	
  if ( !empty($_POST))
	{
	    $appointments = $_POST['APPOINTMENTS'];		
	    $ActualDate = $_POST['ActualDate'];
		$attendees = $_POST['attendees'];
		$CustomerComments = $_POST['CustomerComments'];
		$EmployeeComments = $_POST['EmployeeComments'];
		$Follow_up = $_POST['Follow_up'];  	       
		$addEmail = $_POST['Email']; 
		$email_list = explode(";", $addEmail);
		$total_emails = count($email_list);
		$Email = implode(",",$email_list);
		$date = date("Y/m/d");
        $time =  date("h:i:sa");	
		
			   $pdo = Database::connect();
				$sql = "SELECT clt.ID CLIENT_ID, clt.CLIENT_NAME CLIENT_NAME, clt.CLIENT_EMAIL_ID CLIENT_EMAIL_ID,emp.ID EMPLOYEE_ID, emp.EMP_NAME EMP_NAME, emp.EMAIL_ID EMAIL_ID,emp.SEND_EMAIL_ID1 SEND_EMAIL_ID1, emp.SEND_EMAIL_ID2 SEND_EMAIL_ID2,
				emp.SEND_EMAIL_ID3 SEND_EMAIL_ID3, emp.SEND_EMAIL_ID4 SEND_EMAIL_ID4,emp.SEND_EMAIL_ID5 SEND_EMAIL_ID5,emp.SEND_EMAIL_ID6 SEND_EMAIL_ID6,visit.PURPOSE_NAME PURPOSE_NAME
                FROM CLIENT_APPOINTMENTS clapp, CLIENT_DETAILS clt, EMP_DETAILS emp, VISIT_PURPOSES visit
                WHERE clt.ID=clapp.CLIENT_ID AND emp.ID=clapp.EMPLOYEE_ID AND visit.ID=clapp.VISIT_PURPOSE_ID AND clapp.ID=$appointments";
				$query =  $pdo->prepare( $sql );
				$query->execute();
				for($i=0; $rowval= $query->fetch(); $i++){
				$empEmailId= $rowval['EMAIL_ID'];
				$empID= $rowval['EMPLOYEE_ID'];
				$CLIENT_ID=$rowval['CLIENT_ID'];
				$clientName=$rowval['CLIENT_NAME'];
				$empname=$rowval['EMP_NAME'];
				$visitPurpose=$rowval['PURPOSE_NAME'];
				$clientEmailId=$rowval['CLIENT_EMAIL_ID'];
				}
		$appointment="$clientName,$empname,$visitPurpose";	 	
	    require ("../../classes/class.phpmailer.php");   
		
		$Message ="<fieldset>   
			 </br>
			 <table width='100%' border='0' bgcolor='#999999'>
				  <tr>
					<td width='21%'><strong>VISIT REPORT :</strong></td>
					<td width='26%' >$appointment</td>
					<td width='7%' ><strong>DATE :</strong></td>
					<td width='14%'>$date</td>
					<td width='7%' ><strong>TIME :</strong></td>
					<td width='25%' >$time</td>
				  </tr>
				</table>
				<table width='100%' border='0'>
		  <tr>
			<th width='19%' scope='row'><div align='left'>Appointments  With </div></th>
                          <td ><strong>:</strong></td>
			<td width='81%' >$appointment</td>
		  </tr>
		 
		  <tr>
			<th scope='row' ><div align='left'>Actual Visit Date </div></th>
<td><strong>:</strong></td>
			<td>$ActualDate</td>
		  </tr>
		
		   <tr>
			<th scope='row' ><div align='left'>Attendees </div></th>
<td><strong>:</strong></td>
			<td>$attendees</td>
		  </tr>
			<th scope='row' ><div align='left'>Customer Comments</div></th>
<td ><strong>:</strong></td>
			<td>$CustomerComments</td>
		  </tr>
		  <tr>
			<th scope='row'><div align='left'>Employee Comments </div></th>
<td><strong>:</strong></td>
			<td>$EmployeeComments</td>
		  </tr>
		  <tr>
			<th scope='row' ><div align='left'>Follow-up Points </div></th>
<td ><strong>:</strong></td>
			<td>$Follow_up</td>
		  </tr>
		</table>
		 </fieldset>";
		
		     
         $FromEmail =   'arunraj.balu@gaddieltech.com'; //sumithnets@yahoo.com
		 $Subject   =   "VISIT REPORT - $appointments  DATE - $date TIME - $time";  		
		 $FromName  =   'GADDIELTECH';  // Sumith Harshan
		
 		$mail = new PHPMailer();
         
         $mail->From     = $FromEmail;
         $mail->FromName = $FromName;
         try
		 {
         $mail->IsSMTP(); 
         
         $mail->SMTPAuth = true;     // turn of SMTP authentication
         $mail->Username = 'arunraj.balu@gaddieltech.com';  // SMTP username  (Ex: sumithnets@yahoo.com)
         $mail->Password = 'arunRaj123'; // SMTP password  (Ex: yahoo email password)
         $mail->SMTPSecure = 'ssl';
        
         $mail->Host = 'smtp.mail.gaddieltech.com';
         $mail->Port = 465;
         $mail->SMTPKeepAlive = true;		 
		 $mail->Mailer = 'smtp';
         $mail->Sender   =  $FromEmail;// $bounce_email;
         $mail->ConfirmReadingTo  = $FromEmail;
         
         $mail->AddReplyTo($FromEmail);
         $mail->IsHTML(true); //turn on to send html email
         $mail->Subject = $Subject;
        
         $mail->Body     = $Message;
         $file_to_attach = $_FILES['userfiles']['tmp_name'];
         $filename=$_FILES['userfiles']['name'];
         $mail->AddAttachment( $file_to_attach , $filename, 'base64','mime/type');
		 if($addEmail==""){
		  $mail->AddAddress('arunbalu79@gmail.com'); 
		 }
		 else{
		 for ($counter=0; $counter<$total_emails; $counter++) {
			$email_list[$counter] = trim($email_list[$counter]);
			 $mail->AddAddress($email_list[$counter]);
        }     
        }		
		 $mail->AddAddress ($clientEmailId);
		 $mail->AddCC ($empEmailId);
		 $mail->AddCC ($email1);
         $mail->AddCC($email2);
         $mail->AddCC ($email3);
	  	 $mail->AddCC ($email4);
		 $mail->AddCC ($email5);
		 $mail->AddCC ($email6);
         if($mail->Send()){
          echo "<div class='alert alert-success'> Email sent to : $Email </div>"; 
         }
	    }
        catch(Exception $e)
		{
		   echo "<div class='alert alert-info'> server problem</div>"; 
		}		
	          
			  
				
				
			    $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
                $sqlq = "INSERT INTO VISIT_REPORTS (CREATED_DATE,APNT_ID,EMP_ID,CLIENT_ID,VISIT_DATE,ADDL_EMAIL_ID,ATTENDEES,EMPLOYEE_COMMENTS,FOLLOWUP_POINTS,CLIENT_COMMENTS) values(now(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sqlq);
                $q->execute(array($appointments,$empID,$CLIENT_ID,$ActualDate,$addEmail,$attendees,$EmployeeComments,$Follow_up,$CustomerComments));
                Database::disconnect();	
			
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
              	header('Location:enterVisitReports.php');
				ob_end_flush();
                 exit;
		    
			}
			ob_end_flush();
		?>			
				<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
					<div class="dock-wrapper">    
							 <div class="navbar navbar-fixed-bottom">
								<div class="navbar-inner">
									<div class="container">                  
											<center>
												<div class="btn-group btn-group-justified">                      
								
													<a href="enterVisitReports.php" class="btn btn-default">
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
