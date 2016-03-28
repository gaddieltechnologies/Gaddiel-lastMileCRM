<?php
ob_start();
session_start();
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
				
			    $VISIT_SCH_PERIODID = $_POST['VISIT_SCH_PERIODID'];
				$VISIT_COUNT = $_POST['VISIT_COUNT'];
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
					SET CREATED_DATE= NOW(), CLIENT_CODE=?, CLIENT_NAME=?, CLIENT_CLASSIFICATION_ID=?,CLIENT_LOC=?, CLIENT_LOC_LNG=?, CLIENT_LOC_LAT=?, SWLAT=?, SWLNG=?, NELAT=?, NELNG=?, MAXLAT=?, MINLAT=?, MAXLON=?, MINLON=?, RANGE_IN_MTS=?, VISIT_SCH_PERIOD_ID=?, VISIT_COUNT=?
					WHERE ID=?";
					$pdo = Database::connect();
			       $q = $pdo->prepare($sql);
                $q->execute(array($CLIENT_CODE ,$CLIENT_NAME,$CLIENT_CLASSIFICATION_ID ,$CLIENT_LOC,$CLIENT_LOC_LNG ,$CLIENT_LOC_LAT,$SWLAT ,$SWLNG ,$NELAT ,$NELNG , $MAXLAT ,$MINLAT ,$MAXLON ,$MINLON ,$RANGE ,$VISIT_SCH_PERIODID,$VISIT_COUNT,$ID));
                Database::disconnect();	
				
				
				
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			
			echo '<script type="text/javascript">
				window.location.href = "clientDetails.php";
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
								<h3>Edit Client</h3>
							</div>
							<div class="widget-content">							                              
                                 <div class="span3"><label>Code<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo $row['CLIENT_CODE'];?>" name="CLIENT_CODE"  id="CLIENT_CODE" class="span3"></div>
								<div class="span3"><label>Name<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['CLIENT_NAME'];?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>								
								<div class="span5"><label>Classification<font color="#FF0000"> *</font></label>
								
								<?php 
										
										
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESCRIPTION FROM CLIENT_CLASSIFICATION");
											$result->execute();
											
											echo '<select class="span5" name="CCID" onChange="showState(this);">';
																						
											for($i=0; $rowclf = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											
                                           <option value="<?php  echo $rowclf['ID']; echo '" '; if($rowclf['ID'] == $row['CLIENT_CLASSIFICATION_ID']) { echo 'selected'; } ?> "><?php  echo $rowclf['ID'];?>( <?php  echo $rowclf['DESCRIPTION'];?> ) </option> 
										 
											<?php } echo '</select>';  ?>		
								</div>
								
								<div id="cid">									  
							   <div class="span3"><label>Category</label><input type="text" value="<?php echo $rows['CLIENT_CATEGORY'];?>" disabled="disabled" class="span3"></div>
								<div class="span3"><label>Category Description</label><input type="text" value="<?php  echo $rows['DESCRIPTIONN'];?> "disabled="disabled" class="span3"></div>
								<div class="span1"><label> Class</label><input type="text" value="<?php echo $rows['CLIENT_CLASS'];?>" disabled="disabled" class="span1"></div>
								<div class="span4"><label>Class Description</label><input type="text" value=" <?php  echo $rows['DESCRIPTION'];?> " disabled="disabled" class="span4"></div>
								</div>	
                                	
								  <div class="span3"><label>Location Name<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['CLIENT_LOC'];?>" name="CLIENT_LOC" id="CLIENT_LOC"  class="span3"></div>							                             				
                                <div class="span3"><label>Location Latitude</label><input type="text" maxlength="20" value="<?php echo $row['CLIENT_LOC_LAT'];?>" name="CLIENT_LOC_LAT" id="CLIENT_LOC_LAT"  class="span3"></div>
                                <div class="span3"><label>Location Longitude</label><input type="text" maxlength="20" value="<?php echo $row['CLIENT_LOC_LNG'];?>" name="CLIENT_LOC_LNG" id="CLIENT_LOC_LNG" class="span3"></div>													
                                <div class="span2"><label>Range in Meters</label><input type="text" maxlength="20" value="<?php echo $row['RANGE_IN_MTS'];?>" name="RANGE" id="RANGE" class="span2"></div>
							   				
								
								
								<div class="span5"><label>RI Visit Schedule<font color="#FF0000"> *</font></label>
									
									<?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,SCH_PERIOD,DESCRIPTION FROM VISIT_SCH_PERIODS");
											$result->execute();
											
											echo '<select class="span5" name="VISIT_SCH_PERIODID">';
																						
											for($i=0; $rowri = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
										
											<option value="<?php  echo $rowri['ID']; echo '" '; if($rowri['ID'] == $row['VISIT_SCH_PERIOD_ID']) { echo 'selected'; } ?> ><?php  echo $rowri['SCH_PERIOD'];?> ( <?php  echo $rowri['DESCRIPTION'];?> )  </option>  
											<?php } echo '</select>';  ?>
                                </div>								
								
								<div class="span3"><label> Visit Count<font color="#FF0000"> *</font></label><input type="text" maxlength="4" value="<?php echo $row['VISIT_COUNT'];?>" name="VISIT_COUNT" id="VISIT_COUNT" onkeypress="return onlyNoss(event,this);"  class="span3"></div>
                               
                             	<div class="span3"><label>&nbsp;</label><input type="submit" name="update" value="Update" class="btn btn-success span3" /></div>		
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
</form>		
<?php
	}
	
?>	
</body>

</html>