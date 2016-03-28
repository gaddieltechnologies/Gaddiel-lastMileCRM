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
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var CLIENT_CODE = document.getElementById("CLIENT_CODE");
	var CLIENT_NAME= document.getElementById("CLIENT_NAME");
	var CLIENT_LOC = document.getElementById("CLIENT_LOC");
	var CLIENT_CLASSIFICATION= document.getElementById("CCID");
	var VISIT_COUNT = document.getElementById("VISIT_COUNT");	
	var VISIT_SCH_PERIOD_ID= document.getElementById("VISIT_SCH_PERIOD_ID");
	
	
	var Active = document.getElementById("ACTIVE");
	//var lname = document.getElementById("RI_CODE");
	
	if( CLIENT_CODE.value.trim() == ''){
		valid = false;
		message = message + '*Client Code is required' + '\n';
	}
	if(CLIENT_NAME.value.trim() == ''){
		valid = false;
		message = message + '*Client Name is required' + '\n';
	}
	
	if(CLIENT_LOC.value.trim() == ''){
		valid = false;
		message = message + '*Client Location is required' + '\n';
	}
	
	if(SE_VISIT_COUNT.value.trim() == ''){
		valid = false;
		message = message + '*SE Visit Count is required' + '\n';
	}
    if(CLIENT_CLASSIFICATION.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client Classification is required' + '\n';
	}
	
	
	if(VISIT_SCH_PERIOD_ID.value == '-- SELECT --'){
		valid = false;
		message = message + '* Visit Schedule is required' + '\n';
	}
	if(VISIT_COUNT.value.trim() == ''){
		valid = false;
		message = message + '* Visit Count is required' + '\n';
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
  function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		  function onlyNoss(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
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
	<form action="addClientDetails.php" method="POST" enctype="multipart/form-data" onSubmit="return Validate();">
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
									<h3>Client Details</h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
											
									</div>  
									<div class="box-holder">
												
												 
									</div>  
									<div class="box-holder">
										<a href="clientDetails.php">
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
								<h3>Add Client</h3>
							</div>
							<div class="widget-content">
													
                                 <div class="span3"><label>Code<font color="#FF0000"> *</font></label><input type="text" autofocus name="CLIENT_CODE"  id="CLIENT_CODE" class="span3"></div>
								<div class="span3"><label>Name<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>								
							
								
								<div class="span5"><label>Classification<font color="#FF0000"> *</font></label>
								
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESCRIPTION FROM CLIENT_CLASSIFICATION");
											$result->execute();
											
											echo '<select class="span5" name="CCID" id="CCID" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['ID'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>		
								</div>	
								
							
							    <div id="CategoryID">
								<div class="span3"><label>Category</label><input type="text" value="<?php echo $row['CLIENT_CATEGORY'];?>" disabled="disabled" class="span3"></div>
								<div class="span3"><label>Category Description</label><input type="text" value="<?php  echo $row['DESCRIPTIONN'];?> "disabled="disabled" class="span3"></div>
								<div class="span1"><label>Class</label><input type="text" value="<?php echo $row['CLIENT_CLASS'];?>" disabled="disabled" class="span1"></div>
								<div class="span4"><label>Class Description</label><input type="text" value=" <?php  echo $row['DESCRIPTION'];?> " disabled="disabled" class="span4"></div>
                                </div>
									
								  <div class="span3"><label>Location Name<font color="#FF0000"> *</font></label><input type="text" value="" name="CLIENT_LOC" id="CLIENT_LOC"  class="span3"></div>							
                                <div class="span3"><label>Location Latitude</label><input type="text" maxlength="20" value="" name="CLIENT_LOC_LAT" id="CLIENT_LOC_LAT"  class="span3"></div>
                                <div class="span3"><label>Location Longitude</label><input type="text" maxlength="20" value="" name="CLIENT_LOC_LNG" id="CLIENT_LOC_LNG" class="span3"></div>
								 <div class="span2"><label>Range in Meters</label><input type="text" maxlength="20" value="" name="RANGE" id="RANGE" class="span2"></div>                             	
								
								<div class="span5"><label>Visit Schedule<font color="#FF0000"> *</font></label>
								 <?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,SCH_PERIOD,DESCRIPTION FROM VISIT_SCH_PERIODS");
											$result->execute();
											
											echo '<select class="span5" id="VISIT_SCH_PERIOD_ID" name="VISIT_SCH_PERIOD_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['SCH_PERIOD'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
										
								 </div>
								
														
								<div class="span3"><label>Visit Count<font color="#FF0000"> *</font></label><input type="text" maxlength="4" value="" name="VISIT_COUNT" id="VISIT_COUNT" onkeypress="return onlyNoss(event,this);" class="span3"></div>
                               
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-success span3" /></div>		
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
												
													<a href="clientDetails.php" class="btn btn-default">
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
		    	 
				$CLIENT_CODE = $_POST['CLIENT_CODE'];
			    $CLIENT_NAME = $_POST['CLIENT_NAME'];
			    $CLIENT_CLASSIFICATION_ID = $_POST['CCID'];
			    $CLIENT_LOC = $_POST['CLIENT_LOC'];
			    $CLIENT_LOC_LNG = $_POST['CLIENT_LOC_LNG'];
			    $CLIENT_LOC_LAT = $_POST['CLIENT_LOC_LAT'];		   
			    $RANGE = $_POST['RANGE'];
			   // $RI_CODE =$_SESSION['RIcode'];
           
			    $VISIT_SCH_PERIOD_ID = $_POST['VISIT_SCH_PERIOD_ID'];
				$VISIT_COUNT = $_POST['VISIT_COUNT'];
			
			     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_DETAILS WHERE CLIENT_CODE = '$CLIENT_CODE'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Client Code already exits.')</script>";
                 }
			  
		    else{
			       $rad =$RANGE *0.0010;			        
                    $R=6371;
				
				    $lat=$CLIENT_LOC_LAT;
					$lon=$CLIENT_LOC_LNG;
				    $MAXLAT = $lat + rad2deg($rad/$R);					
					$MINLAT = $lat - rad2deg($rad/$R);
					$MAXLON = $lon + rad2deg($rad/$R/cos(deg2rad($lat)));
					$MINLON = $lon - rad2deg($rad/$R/cos(deg2rad($lat)));

					$SWLAT=($CLIENT_LOC_LAT-0.0002); 
					$SWLNG=($CLIENT_LOC_LNG-0.0002);
					$NELAT=($CLIENT_LOC_LAT+0.0002);
					$NELNG=($CLIENT_LOC_LNG+0.0002);
					$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
                $sqlq = "INSERT INTO CLIENT_DETAILS (CREATED_DATE,CLIENT_CODE,CLIENT_NAME,CLIENT_CLASSIFICATION_ID,CLIENT_LOC,CLIENT_LOC_LNG,CLIENT_LOC_LAT,SWLAT,SWLNG,NELAT,NELNG,MAXLAT,MINLAT,MAXLON,MINLON,RANGE_IN_MTS,VISIT_SCH_PERIOD_ID,VISIT_COUNT) values(now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sqlq);
                $q->execute(array($CLIENT_CODE,$CLIENT_NAME,$CLIENT_CLASSIFICATION_ID,$CLIENT_LOC,$CLIENT_LOC_LNG,$CLIENT_LOC_LAT,$SWLAT,$SWLNG,$NELAT,$NELNG,$MAXLAT,$MINLAT,$MAXLON,$MINLON,$RANGE,$VISIT_SCH_PERIOD_ID,$VISIT_COUNT));
                Database::disconnect();	
				
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
              	header('Location:clientDetails.php');
				ob_end_flush();
                 exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>