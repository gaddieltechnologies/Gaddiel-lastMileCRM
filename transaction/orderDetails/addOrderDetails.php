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
	var APPOINTMENTS = document.getElementById("appointments");
	var EMP_NAME= document.getElementById("emp_name");
	var ORDER_TYPE = document.getElementById("order_type");
	var CLIENT_NAME= document.getElementById("client_name");
	var PRODUCT_NAME = document.getElementById("product_name");
	var ORDER_QTY= document.getElementById("order_qty");
	var ORDER_UOM = document.getElementById("order_uom");
	var UNIT_PRICE= document.getElementById("unit_price");
	
	if(APPOINTMENTS.value == '-- SELECT --'){
		valid = false;
		message = message + '*Appointments is required' + '\n';
	}
	if(EMP_NAME.value == '-- SELECT --'){
		valid = false;
		message = message + '*Employee name is required' + '\n';
	}
	if(ORDER_TYPE.value == '-- SELECT --'){
		valid = false;
		message = message + '*Order Type is required' + '\n';
	}
	if(CLIENT_NAME.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client name is required' + '\n';
	}
		if(PRODUCT_NAME.value == '-- SELECT --'){
		valid = false;
		message = message + '*Product Name is required' + '\n';
	}
	if( ORDER_QTY.value.trim() == ''){
		valid = false;
		message = message + '*Order qty is required' + '\n';
	}
	if(ORDER_UOM.value.trim() == ''){
		valid = false;
		message = message + '*Order Uom is required' + '\n';
	}
	
	if(UNIT_PRICE.value.trim() == ''){
		valid = false;
		message = message + '*Unit Price is required' + '\n';
	}
	
	
	
	if (valid == false){
		alert(message);
		return false;
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

		if (document.getElementById('booking_date').value == ''){
		document.getElementById('booking_date').value = year + '-' + month + '-' + day +' '+hour + ':'+ min;
		}
		if (document.getElementById('delivery_due_date').value == ''){
		document.getElementById('delivery_due_date').value = year + '-' + month + '-' + day +' '+ hour + ':'+ min;
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
<body onload="addDate();">

<!-- Navbar -->
    
	
	<!-- /Navbar -->
	<form action="addOrderDetails.php" method="POST" enctype="multipart/form-data" onSubmit="return Validate();">
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
									<h3>Order Details</h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
											
									</div>  
									<div class="box-holder">
												
												 
									</div>  
									<div class="box-holder">
										<a href="orderDetails.php">
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
								<h3>Add Order Details</h3>
							</div>
							<div class="widget-content">
							 					
                                 <div class="span6"><label>Booking Employee<font color="#FF0000"> *</font></label>
								 <?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,EMP_NAME FROM EMP_DETAILS");
											$result->execute();
											
											echo '<select class="span6" name="EMP_NAME" id="emp_name" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['EMP_NAME'];?>  </option>						    
											<?php } echo '</select>';  ?>		
								</div>								 
								<div class="span5"><label>Order Type<font color="#FF0000"> *</font></label>
								 <?php 
																				
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,ORDER_TYPE,DESCRIPTION FROM ORDER_TYPES");
											$result->execute();
											
											echo '<select class="span5" name="ORDER_TYPE" id="order_type" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['ORDER_TYPE'];?> (<?php  echo $row['DESCRIPTION'];?>)</option>						    
											<?php } echo '</select>';  ?>		
								</div>	
								
                                <div class="span6"><label>Client<font color="#FF0000"> *</font></label>
								 <?php 
																				
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,CLIENT_NAME FROM CLIENT_DETAILS");
											$result->execute();
											
											echo '<select class="span6" name="CLIENT_NAME" id="client_name" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"> <?php  echo $row['CLIENT_NAME'];?> </option>						    
											<?php } echo '</select>';  ?>		
								</div>	
								
								<div class="span5"><label>Product <font color="#FF0000"> *</font></label>
									 <?php 
																				
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,PRODUCT_NAME,DESCRIPTION FROM PRODUCT_MASTER");
											$result->execute();
											
											echo '<select class="span5" name="PRODUCT_NAME" id="product_name" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['PRODUCT_NAME'];?>  (<?php  echo $row['DESCRIPTION'];?>)</option>						    
											<?php } echo '</select>';  ?>		
								</div>
								<div class="span4"><label>UOM<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="ORDER_UOM"  id="order_uom" class="span4"></div>															
								<div class="span4"><label>Unit Price<font color="#FF0000"> *</font></label><input type="text" value="" name="UNIT_PRICE" id="unit_price"  class="span4"></div>
												
								
								<div class="span3"><label>Order Qty<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="ORDER_QTY"  id="order_qty" class="span3"></div>				
								<div class="span4"><label>Booking Date Time</label><input type="text" maxlength="20" value="" name="BOOKING_DATE" id="booking_date" class="span4 pickerfield"/></div>
								<div class="span4"><label>Delivery Due Date Time</label><input type="text" value="" name="DELIVERY_DUE_DATE" id="delivery_due_date"  class="span4 pickerfield"/></div>	
								<div class="span3"><label>Special Instructions</label><input type="text" maxlength="20" value="" name="SPECIAL_INSTRUCTIONS" id="special_instructions" class="span3"/></div>
								<div class="span4"><label>Order Comments</label><textarea   value="" name="ORDER_COMMENTS" id="order_comments"  class="span4"></textarea></div>	
								<div class="span4"><label>Followup Points</label><textarea   value="" name="FOLLOWUP_POINTS" id="followup_points" class="span4"></textarea></div>  
                             				
								
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
												
													<a href="orderDetails.php" class="btn btn-default">
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
		    	
				$EMP_NAME = $_POST['EMP_NAME'];
				$ORDER_TYPE = $_POST['ORDER_TYPE'];
			    $CLIENT_NAME = $_POST['CLIENT_NAME'];			   
			    $PRODUCT_NAME = $_POST['PRODUCT_NAME'];
			    $ORDER_QTY = $_POST['ORDER_QTY'];
			    $ORDER_UOM = $_POST['ORDER_UOM'];
				$UNIT_PRICE = $_POST['UNIT_PRICE'];
			    $BOOKING_DATE = $_POST['BOOKING_DATE'];
			    $DELIVERY_DUE_DATE = $_POST['DELIVERY_DUE_DATE'];
			    $SPECIAL_INSTRUCTIONS = $_POST['SPECIAL_INSTRUCTIONS'];
				$ORDER_COMMENTS = $_POST['ORDER_COMMENTS'];			
			    $FOLLOWUP_POINTS = $_POST['FOLLOWUP_POINTS'];
			   
               $NetPrice=$UNIT_PRICE * $ORDER_UOM;
			     $valid = true;
                
				
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $result = $pdo->prepare("SELECT EMP_NAME,EMAIL_ID,SEND_EMAIL_ID1,SEND_EMAIL_ID2,SEND_EMAIL_ID3,SEND_EMAIL_ID4,SEND_EMAIL_ID5,SEND_EMAIL_ID6 FROM EMP_DETAILS WHERE ID = '$EMP_NAME'");
				$result->execute();									
				Database::disconnect();
				for($i=0; $rows = $result->fetch(); $i++){
				            $empname= $rows['EMP_NAME'];
				           $empID= $rows['EMAIL_ID'];
						   $email1= $rows['SEND_EMAIL_ID1'];
						   $email2= $rows['SEND_EMAIL_ID2'];
						   $email3= $rows['SEND_EMAIL_ID3'];
						   $email4= $rows['SEND_EMAIL_ID4'];
						   $email5= $rows['SEND_EMAIL_ID5'];
						   $email6= $rows['SEND_EMAIL_ID6'];
				}
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $result = $pdo->prepare("SELECT CLIENT_NAME,CLIENT_LOC,CLIENT_EMAIL_ID FROM CLIENT_DETAILS WHERE ID = '$CLIENT_NAME'");
				$result->execute();									
				Database::disconnect();
				$rowclt = $result->fetch();
				 $clientName= $rowclt['CLIENT_NAME'];
				 $clientEmailId= $rowclt['CLIENT_EMAIL_ID'];
				 $clientLocation= $rowclt['CLIENT_LOC'];
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $result = $pdo->prepare("SELECT PRODUCT_CODE, DESCRIPTION FROM PRODUCT_MASTER WHERE ID = '$PRODUCT_NAME'");
				$result->execute();									
				Database::disconnect();
				for($k=0; $rowclt = $result->fetch(); $k++)
				{
				$ProductCode= $rowclt['PRODUCT_CODE'];
				$ProductDes= $rowclt['DESCRIPTION'];
				}
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $result = $pdo->prepare("SELECT ORDER_TYPE FROM ORDER_TYPES WHERE ID = '$ORDER_TYPE'");
				$result->execute();									
				Database::disconnect();
				$roword = $result->fetch();
				$OrderType= $roword['ORDER_TYPE'];
				

		 require ("../../classes/class.phpmailer.php");   		  	
		$date = date("Y/m/d");
        $time =  date("h:i:sa");		
		$Message ="<p>Sirs,</p><br>
		      <p>We confirm receipt of your order for the following products</P><br>
			  <p>Client - $clientName,$clientLocation</p>
			  <table border='1' width='100%' >
			  <tr>
				<td>Sl#</td>
				<td>Product Code</td>
				<td>Product Description</td>
				<td>Qty</td>
				<td>UOM</td>
				<td>Unit Price</td>
				<td>Value</td>
				<td>Due_Date</td>
				<td>Special Instructions</td>
			  </tr>
			  <tr>
			    <td>1</td>
				<td>$ProductCode</td>
				<td>$ProductDes</td>
				<td>$ORDER_QTY</td>
				<td>$ORDER_UOM</td>
				<td>$UNIT_PRICE</td>
				<td>$NetPrice</td>
				<td>$DELIVERY_DUE_DATE</td>
				<td>$SPECIAL_INSTRUCTIONS</td>
				
			  </tr>
			</table>
			<p>Thank you for the order.</p>
			<p>We wish to serve you further and assure you of our best services and best of the quality products.</p><br>
			<p>Regards,</p>
			";
		     
         $FromEmail =   'arunraj.balu@gaddieltech.com'; //sumithnets@yahoo.com
		 $Subject   =   "Order Type - $OrderType,  Client Name-  $clientName, Employee Name - $empname , BOOK DATE - $date";  		
		 $FromName  =   'GADDIELTECH';  // Sumith Harshan
		
 		$mail = new PHPMailer();
         
         $mail->From     = $FromEmail;
         $mail->FromName = $FromName;
         
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
        // $file_to_attach = $_FILES['userfiles']['tmp_name'];
        // $filename=$_FILES['userfiles']['name'];
        // $mail->AddAttachment( $file_to_attach , $filename, 'base64','mime/type');
		//$mail->AddAddress ($clientEmailId);
		//$mail->AddCC ("arunbalu79@gmail.com");
		$mail->AddCC ($empID);
		 $mail->AddCC ($email1);
         $mail->AddCC($email2);
         $mail->AddCC ($email3);
	  	 $mail->AddCC ($email4);
		 $mail->AddCC ($email5);
		 $mail->AddCC ($email6);
		 if($mail->Send()){
          echo "<div class='alert alert-success'> Email sent to : $empID,$email1,$email2,$email3,$email4,$email5,$email6 </div>"; 
         }					
			    $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
                $sqlq = "INSERT INTO ORDER_DETAILS (CREATED_DATE,BOOKING_EMPLOYEE_ID,ORDER_TYPE_ID,CLIENT_ID,PRODUCT_ID,ORDER_QTY,ORDER_UOM,UNIT_PRICE,BOOKING_DATE,DELIVERY_DUE_DATE,SPECIAL_INSTRUCTIONS,ORDER_COMMENTS,FOLLOWUP_POINTS) values(now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sqlq);
                $q->execute(array($EMP_NAME,$ORDER_TYPE,$CLIENT_NAME,$PRODUCT_NAME,$ORDER_QTY,$ORDER_UOM,$UNIT_PRICE,$BOOKING_DATE,$DELIVERY_DUE_DATE,$SPECIAL_INSTRUCTIONS,$ORDER_COMMENTS,$FOLLOWUP_POINTS));
                Database::disconnect();	
				
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
              	header('Location:orderDetails.php');
				ob_end_flush();
                 exit;
			}
			ob_end_flush();
			
		?>