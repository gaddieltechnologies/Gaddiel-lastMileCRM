<?php
ob_start();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>crM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
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
$(function() {
				  $('.pickerfield').datetime({
									userLang	: 'en',
									americanMode: true,
								});
			});
function Validate(){
	var valid = true;
	var message = '';
	var CLIENT_CLASSIFICATION= document.getElementById("CCID");
	var EmployeeId= document.getElementById("EmployeeId");	
	var VISIT_PURPOSE_ID= document.getElementById("VISIT_PURPOSE_ID");
	
	
	var Active = document.getElementById("ACTIVE");
	//var lname = document.getElementById("RI_CODE");
	
	
    if(CLIENT_CLASSIFICATION.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client Id is required' + '\n';
	}
	
	if(EmployeeId.value == '-- SELECT --'){
		valid = false;
		message = message + '*Employee Id is required' + '\n';
	}
	 if(VISIT_PURPOSE_ID.value == '-- SELECT --'){
		valid = false;
		message = message + '*Visit Purpose Id is required' + '\n';
	}

	if (valid == false){
		alert(message);
		return false;
	}
}


</script>	
<script type="text/JavaScript">

function showState(sel) {
    var id = sel.options[sel.selectedIndex].value;  
    $("#CategoryID").html( "" );
   // $("#output2").html( "" );
    if (id.length > 0 ) {
 
     $.ajax({
            type: "POST",
            url: "subClientCat.php",
            data: "id="+id,
            cache: false,
            
            success: function(html) {    
                $("#CategoryID").html( html );
				 
            }
        });
    }
}
function showStates(RI) {
    var SECode = RI.options[RI.selectedIndex].value;  
    $("#RIcode").html( "" );
   // $("#output2").html( "" );
    if (SECode.length > 0 ) {
 
     $.ajax({
            type: "POST",
            url: "subjobcat.php",
            data: "SECode="+SECode,
            cache: false,           
            success: function(html) {    
                $("#RIcode").html( html );
		 
		
            }
        });
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

		
		if (document.getElementById('APPT_DATETIME').value == ''){
		document.getElementById('APPT_DATETIME').value = year + '-' + month + '-' + day +' '+ hour + ':'+ min;
		}
}
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
	<form action="addClientAppointment.php" method="POST" enctype="multipart/form-data" onSubmit="return Validate();">
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
									<h3>Client Appointment</h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
											
									</div>  
									<div class="box-holder">
												
												 
									</div>  
									<div class="box-holder">
										<a href="clientAppointment.php">
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
								<h3>Add Client Appointment</h3>
							</div>
							<div class="widget-content">
													                              
								<div class="span5"><label>Client <font color="#FF0000"> *</font></label>
								
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,CLIENT_NAME FROM CLIENT_DETAILS");
											$result->execute();
											
											echo '<select class="span5" name="CCID" id="CCID" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['CLIENT_NAME'];?> </option>						    
											<?php } echo '</select>';  ?>		
								</div>	
								  <div class="span6"><label>Employee<font color="#FF0000"> *</font></label>
								  <?php 
										
										
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,EMP_NAME FROM EMP_DETAILS");
											$result->execute();
											
											echo '<select class="span6" name="EMPLOYEE_ID" id="EmployeeId" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"> <?php  echo $row['EMP_NAME'];?></option>						    
											<?php } echo '</select>';  ?>		
								</div>
									<div class="span5"><label>Visit Purpose<font color="#FF0000"> *</font></label>  <?php 
										
										
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,PURPOSE_NAME,DESCRIPTION FROM VISIT_PURPOSES");
											$result->execute();
											
											echo '<select class="span5" name="VISIT_PURPOSE_ID" id="VISIT_PURPOSE_ID" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['PURPOSE_NAME'];?>( <?php  echo $row['DESCRIPTION'];?> )</option>						    
											<?php } echo '</select>';  ?>		
								</div>	
                                <div class="span3"><label>Appt Date Time</label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="APPT_DATETIME"  id="APPT_DATETIME" class="span3 pickerfield"></div> 				
							
								
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Add" value="Add"  class="btn btn-success span3" /></div>		
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
												
													<a href="clientAppointment.php" class="btn btn-default">
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

		  if ( !empty($_POST))
			{
		    	 
			    $EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];							
				$CLIENT_ID = $_POST['CCID'];			
				$APPT_DATETIME = $_POST['APPT_DATETIME'];
				$VISIT_PURPOSE_ID = $_POST['VISIT_PURPOSE_ID'];
           
			     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_APPOINTMENTS WHERE CLIENT_ID = '$CLIENT_ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
              
			     
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
                $sqlq = "INSERT INTO CLIENT_APPOINTMENTS (CREATED_DATE,CLIENT_ID,EMPLOYEE_ID,VISIT_PURPOSE_ID,APPT_DATETIME) values(now(), ?, ?, ?, ?)";
                $q = $pdo->prepare($sqlq);
                $q->execute(array($CLIENT_ID,$EMPLOYEE_ID,$VISIT_PURPOSE_ID,$APPT_DATETIME));
                Database::disconnect();	
				
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
              	header('Location:clientAppointment.php');
				ob_end_flush();
                 exit;
		    
			    
			  	
			}
			ob_end_flush();
			
		?>