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
	//var SE_VISIT_SCH_PERIOD_ID= document.getElementById("SE_VISIT_SCH_PERIOD_ID");
	var SE_VISIT_COUNT = document.getElementById("SE_VISIT_COUNT");
	//var RI_VISIT_SCH_PERIOD_ID= document.getElementById("RI_VISIT_SCH_PERIOD_ID");
	var RI_VISIT_COUNT = document.getElementById("RI_VISIT_COUNT");
	
	
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
    
	if(RI_VISIT_COUNT.value.trim() == ''){
		valid = false;
		message = message + '*RI Visit Count is required' + '\n';
	}
	
	if (valid == false){
		alert(message);
		return false;
	}
}
	 
	function navigate()
{
 
   location.href="orderDetails.php";
 } 
  
</script>
<script type="text/javascript">

function showState(sel) {
    var id = sel.options[sel.selectedIndex].value;  
    $("#cid").html( "");
   // $("#output2").html( "" );
    if (id.length > 0 ) {
 
     $.ajax({
            type: "POST",
            url: "subClientCat.php",
            data: "id="+id,
            cache: false,
            
            success: function(html) {    
                $("#cid").html( html );
				 
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
			<?php
			
			 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); 
			ob_start();
				 if ( !empty($_POST)) {
				 
	
			$ID =$_GET['id'];	        		
			$CLIENT_CODE = $_POST['CLIENT_CODE'];
			    $CLIENT_NAME = $_POST['CLIENT_NAME'];
			    $CLIENT_CLASSIFICATION_ID = $_POST['CCID'];
			     $CLIENT_LOC = $_POST['CLIENT_LOC'];
			    $CLIENT_LOC_LNG = $_POST['CLIENT_LOC_LNG'];
			    $CLIENT_LOC_LAT = $_POST['CLIENT_LOC_LAT'];
				$SE_CODE = $_POST['SE_CODE'];
			    $SE_VISIT_SCH_PERIODID = $_POST['SE_VISIT_SCH_PERIODID'];
			    $SE_VISIT_COUNT = $_POST['SE_VISIT_COUNT'];
			   // $RI_CODE = $_SESSION['RIcode'];
			    $RI_VISIT_SCH_PERIODID = $_POST['RI_VISIT_SCH_PERIODID'];
				$RI_VISIT_COUNT = $_POST['RI_VISIT_COUNT'];
				$RANGE = $_POST['RANGE'];
			// query
			   $pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_DETAILS WHERE CLIENT_CODE = '$CLIENT_CODE' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	   echo "<div class='alert alert-info'>Client Code<'$CLIENT_CODE '> already exists. No update done.... </div>";
						
				
                 }
			  
		    else{
		
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query ="SELECT RI_CODE FROM JOB_HIERARCHY WHERE SE_CODE = '$SE_CODE'";
				$result = $pdo->prepare($query);
				$result->execute();
				$rows = $result->fetch();
				$RI_CODE = $rows['RI_CODE'];
			    
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
			
			$sql = "UPDATE CLIENT_DETAILS 
					SET CREATED_DATE= NOW(), CLIENT_CODE=?, CLIENT_NAME=?, CLIENT_CLASSIFICATION_ID=?,CLIENT_LOC=?, CLIENT_LOC_LNG=?, CLIENT_LOC_LAT=?, SWLAT=?, SWLNG=?, NELAT=?, NELNG=?, MAXLAT=?, MINLAT=?, MAXLON=?, MINLON=?, RANGE_IN_MTS=?, SE_CODE=?, SE_VISIT_SCH_PERIOD_ID=?,SE_VISIT_COUNT=?,RI_CODE=?, RI_VISIT_SCH_PERIOD_ID=?, RI_VISIT_COUNT=?
					WHERE ID=?";
					$pdo = Database::connect();
			       $q = $pdo->prepare($sql);
                $q->execute(array($CLIENT_CODE ,$CLIENT_NAME,$CLIENT_CLASSIFICATION_ID ,$CLIENT_LOC,$CLIENT_LOC_LNG ,$CLIENT_LOC_LAT,$SWLAT ,$SWLNG ,$NELAT ,$NELNG , $MAXLAT ,$MINLAT ,$MAXLON ,$MINLON ,$RANGE ,$SE_CODE,$SE_VISIT_SCH_PERIODID,$SE_VISIT_COUNT,$RI_CODE,$RI_VISIT_SCH_PERIODID,$RI_VISIT_COUNT,$ID));
                Database::disconnect();	
				
				
				
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			
			echo '<script type="text/javascript">
				window.location.href = "orderDetails.php";
				</script>';
		}	
			
		}	
			$ID = $_GET['id']; /** get the EMP_DETAILS ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM CLIENT_DETAILS WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
					
					$CLIENT_CLASSIFICATION_ID =$row['CLIENT_CLASSIFICATION_ID'];
					// query
					   $pdo = Database::connect();
					   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$queryy = "select  catg.CLIENT_CATEGORY CLIENT_CATEGORY, catg.DESCRIPTION DESCRIPTIONN, ccls.CLIENT_CLASS CLIENT_CLASS,ccls.DESCRIPTION DESCRIPTION
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_CATEGORY catg,
									 CLIENT_CLASS ccls
									 WHERE  clfn.CLIENT_CATEGORY_ID = catg.ID
									 AND    clfn.CLIENT_CLASS_ID = ccls.ID
                                     AND clfn.ID ='$CLIENT_CLASSIFICATION_ID'";
						$resultt =  $pdo->prepare( $queryy );
						$resultt->execute();
						$rows = $resultt->fetch();	
					 $clientcat = $rows['CLIENT_CATEGORY'];
					 $clientcl = $rows['CLIENT_CLASS'];		
					
					  Database::disconnect();
					  
			ob_end_flush();
						
					?>						
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Order Details</h3>
							</div>
	                        <div class="widget-content">
													
                                 <div class="span3"><label>Booking Employee Id<font color="#FF0000"> *</font></label><input type="text" autofocus name="CLIENT_CODE"  id="CLIENT_CODE" class="span3"></div>
								<div class="span3"><label>Order Type Id<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>	
                                <div class="span2.5"><label>Client Id<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span2.5"></div> 				
								<div class="span2.5"><label>Product Id<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span2.5"></div>	
								<div class="span3"><label>Order Qty<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>				
								<div class="span3"><label>Order Uom<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>															
								<div class="span2.5"><label>Unit Price<font color="#FF0000"> *</font></label><input type="text" value="" name="CLIENT_LOC" id="CLIENT_LOC"  class="span2.5"></div>	
								<div class="span2.5"><label>Booking Date</label><input type="text" maxlength="20" value="" name="RANGE" id="RANGE" class="span2.5"></div>
								<div class="span3"><label>Delivery Due Date<font color="#FF0000"> *</font></label><input type="text" value="" name="CLIENT_LOC" id="CLIENT_LOC"  class="span3"></div>	
								<div class="span3"><label>Special Instructions</label><input type="text" maxlength="20" value="" name="RANGE" id="RANGE" class="span3"></div>
								<div class="span2.5"><label>Order Comments<font color="#FF0000"> *</font></label><input type="text" value="" name="CLIENT_LOC" id="CLIENT_LOC"  class="span2.5"></div>	
								<div class="span2.5"><label>Followup Points</label><input type="text" maxlength="20" value="" name="RANGE" id="RANGE" class="span2.5"></div>  
                                
								
                               	<div class="span5"><label>&nbsp;</label><input type="Button" name="Add" value="Add" onClick="navigate()" class="btn btn-success span5" /></div>		
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
</form>		
<?php
	}
	
?>	
</body>

</html>