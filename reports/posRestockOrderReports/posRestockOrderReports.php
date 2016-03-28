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
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	
	  <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	function Validate(){
	   var valid = true;
	  var message = '';
    var BookingDate = $("#BookingDate").val();
		var DueDate = $("#DueDate").val();
		var EMP_NAME= document.getElementById("EMP_ID");
		
		if(EMP_NAME.value == '-- SELECT --'){
		valid = false;
		message = message + '*Employee name is required' + '\n';
	}
		if (BookingDate > DueDate) {
		valid = false;
		message = message + 'Visit Date From must be earlier to Visit Date To';
		}
		if (valid == false){
		alert(message);
		return false;
		}
		
	}
	 $(function() {

		$(".datepic").datepicker({ dateFormat: 'dd-M-y' }).bind("change",function(){
			var minValue = $(this).val();
			minValue = $.datepicker.parseDate("dd-M-y", minValue);
			minValue.setDate(minValue.getDate()+1);
			$("#to").datepicker( "option", "minDate", minValue );
		})
	});
		window.checkDueDate = function() {
	var BookingDate = $("#BookingDate").val();
		
			var DueDate = $("#DueDate").val();
		
			if (BookingDate > DueDate) {
			alert("Visit Date From must be earlier to Visit Date To");
			}
			};
			function addDate(){
					var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");
		date = new Date();
		var mydate= new Date()
		mydate.setDate(mydate.getDate()-1)
		var month = mydate.getMonth();
		var day = mydate.getDate();
		var year = mydate.getFullYear().toString().substr(2,2);

		if (document.getElementById('BookingDate').value == ''){
		document.getElementById('BookingDate').value = day + '-' + m_names[month] + '-' + year;
		}
		if (document.getElementById('DueDate').value == ''){
		document.getElementById('DueDate').value = day + '-' +  m_names[month] + '-' + year;
		}
}
/*$('#pdfsubmit').click(function(event) {

        var BookingDate = $('#BookingDate').val(); 
        var DueDate   = $('#DueDate').val();
        $.ajax({
                type: "POST",
                url: "clientwiseEmpVisitPlanAndCompliancepdf.php",
                data:"BookingDate="+BookingDate+"&DueDate="+DueDate,
                success: function (msg) {

             
                }
            });

    });*/
</script>

</head>

<body onload="addDate();">

 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	<!-- /Navbar -->
	<form action="posRestockOrderReports.php" method="POST" onSubmit="return Validate();">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			<div class="box-container">
				
			</div>

                <div class="row">
				
					<div class="span12 desktop">					
						<div class="widget">                    					
						<div class="widget-content"> 
									<div class="span7">
										<h3>PoS Restock Order Reports</h3>	
									</div>                       
								    <div class="span3">                                                                
									   <div class="box-holder">
										
									   </div>  
									  
										<div class="box-holder">
											<a href="../reports.php">
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
								<h3>Report Parameters</h3>
							</div>
							
						<div class="widget-content">							   
                                 <div class="span8"><label>Employee Name</label>
									<?php 
										
										    include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,EMP_NAME FROM EMP_DETAILS");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="EMP_ID" id="EMP_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
									?>														
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['EMP_NAME'];?></option >						    
											<?php } echo '</select>';  ?>
									
									</div>				
                                <div class="span4"><label>Booking Date</label><input type="text" autofocus value="" name="BookingDate"  id="BookingDate" class="span4 datepic"></div>
								<div class="span8"><label>Due Date</label><input type="text" value="" name="DueDate" id="DueDate" onchange="checkDueDate()" class="span4 datepic"></div>
                                <div class="span3"><label>&nbsp;</label>
							   <button type="submit" class="btn btn-success " name="pdfsubmit" value="pdf"><img src="../../resources/images/page_white_acrobat.png"/>&nbsp; Export PDF</button></div>  					</div>  	
						</div>
					</div>
				<!-- /Content -->
                </div>
<?php

if(isset($_POST["pdfsubmit"]))
{	
	  $empId = $_POST["EMP_ID"];
	  $date = date("d-M-y");
	  $dt = new DateTime();	  
	  $dated = $dt->format("Y-m-d-H-i-s");
	  $BookingDate = $_POST["BookingDate"];
	$DueDate = $_POST["DueDate"];
	 include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/reports/wrapcell.php');
	$pdf=new PDF_MC_Table('L','cm',"Legal");
	$pdf->Open();
	$pdf->AddPage();
	$pdf->AliasNbPages();
	
	$pdf->SetFont('times','B',12);
	
	$pdf->Cell(0,1,'RESTOCK REQUIREMENTS REPORT',0,1,'C');
	if ($empId=="ALL")
	{
	$pdf->Cell(0,1.5,'PARAMETERS :',0,1,'L');
	$pdf->Cell(3.3,1,'Employee Name :',0,0,'R');
	$pdf->Cell(5,1,"ALL", 0, 0,'L');
	$pdf->Cell(23,1,"Report Date :",0,0,'R');
	$pdf->Cell(0,1,$date,0,0);
	$pdf->Cell(-30.8,2,"Booking Date :",0,0,'R');
	$pdf->Cell(0,2,$BookingDate,0,0);
	$pdf->Cell(-31.5,2.8, "Due Date :",0,0,'R');
	$pdf->Cell(2,2.8, $DueDate, 0, 0,'R');
	$pdf->SetFont('times','B',12);
    $pdf->Ln();	
	 $empId = 'NULL';
	}
	else
	{
	 $empId =  $_POST["EMP_ID"];
	}
	if ($_POST["EMP_ID"] != "ALL")
	        { 		
			   $pdo = Database::connect(); 
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$result = $pdo->prepare("SELECT ID,EMP_NAME FROM  EMP_DETAILS WHERE  ID = $empId");
				$result->execute();	
		       $row = $result->fetch();
				$pdf->Cell(0,1.5,'PARAMETERS :',0,1,'L');
				$pdf->Cell(3.3,1,'Employee Name :',0,0,'R');
				$pdf->Cell(5,1,$row['EMP_NAME'], 0, 0,'L');
				$pdf->Cell(23,1,"Report Date :",0,0,'R');
				$pdf->Cell(0,1,$date,0,0);
				$pdf->Cell(-30.8,2,"Booking Date :",0,0,'R');
				$pdf->Cell(0,2,$BookingDate,0,0);
				$pdf->Cell(-31.5,2.8, "Due Date :",0,0,'R');
				$pdf->Cell(2,2.8, $DueDate, 0, 0,'R');
				$pdf->SetFont('times','B',12);
				$pdf->Ln();	
			}
       	$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $pdo->prepare("SELECT distinct emp.ID ID,emp.EMP_NAME EMP_NAME FROM EMP_DETAILS emp, pos_restock_order ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		AND emp.ID = IFNULL($empId, emp.ID)
		AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
		AND   ord.RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
        $result->execute();	
		for($i=0; $row = $result->fetch(); $i++)
		    {		
                 
				                 
				$pdf->Cell(3.3,1,'Employee Name :',0,0,'R');
				$pdf->Cell(5,1,$row['EMP_NAME'], 0, 0,'L');
				$pdf->SetFont('times','B',12);
               	$pdf->Ln();	

				
                $emp_name=$row['EMP_NAME'];
				
				$pdo = Database::connect(); 
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$resultri = $pdo->prepare("SELECT distinct clt.ID ClientId, clt.CLIENT_NAME CLIENT_NAME FROM EMP_DETAILS emp, CLIENT_DETAILS clt, POS_RESTOCK_ORDER ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		        AND clt.ID=ord.CLIENT_ID AND emp.ID = IFNULL($empId, emp.ID)	
				AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
	        	AND   ord.	RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
				$resultri->execute();

							
				for($r=1; $rowr = $resultri->fetch(); $r++)
				{	
					$pdf->Cell(3.3,1,'Client Name :',0,0,'R');
					$pdf->Cell(5,1,$rowr['CLIENT_NAME'], 0, 0,'L');
					$pdf->SetFont('times','B',12);
					$pdf->Ln();					
						
					$pdf->SetFont('times','B',12);
					$pdf->SetWidths(array(2, 4, 7, 2, 3, 7));
					$pdf->Row(array("Sl#", "Product Code", "Product Description", "Qty", "Due Date & Time","Special Instructions"));
					$OrdCnt = 0;
					$clientid = $rowr['ClientId'];
					
							$pdo = Database::connect(); 
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$resultitv = $pdo->prepare("SELECT prod.PRODUCT_CODE PRODUCT_CODE, prod.DESCRIPTION PROD_DESCRIPTION,ord.ORDER_QTY ORDER_QTY,ord.RESTOCK_DUE_DATE RESTOCK_DUE_DATE,ord.RESTOCK_COMMENTS RESTOCK_COMMENTS
							FROM POS_RESTOCK_ORDER ord,PRODUCT_MASTER prod
							WHERE ord.BOOKING_EMPLOYEE_ID = $empId							
							AND   ord.CLIENT_ID = $clientid							
							AND   ord.PRODUCT_ID = prod.ID
							AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
	        	            AND   ord.RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
							$resultitv->execute();		
                						
							for($j=1; $rowvit = $resultitv->fetch(); $j++)
							{	
                            	
									Database::disconnect();
									$pdf->SetFont('times','',12);
									$pdf->Row(array($j,$rowvit['PRODUCT_CODE'], $rowvit['PROD_DESCRIPTION'],$rowvit['ORDER_QTY'], $rowvit['RESTOCK_DUE_DATE'],$rowvit['RESTOCK_COMMENTS']));
									$OrdCnt =  $OrdCnt +1;
								
							}
					
				if ($OrdCnt == 0) 
					{  
					   $pdf->SetFont('times','B',12);
                       $pdf->Row(array("**No Orders Found**"));
					} 					
						
                }
			}	
        $filename="posRestockOrderReports".$dated.".pdf";
		$pdf->Output($filename,'F');

			echo '<script type="text/javascript">
							window.location.href ="posRestockOrderReports'.$dated.'.pdf";
							</script>';
		
}

if(isset($_POST["excelsubmit"]))
{	
require_once("../excelwriter.class.php");
	$dt = new DateTime();
	$date = $dt->format("Y-m-d-H-i-s");
	$dte = new DateTime();
	$dated = $dte->format("d-M-y");
	$empId=$_POST['EMP_ID'] ;
	$BookingDate =  $_POST['BookingDate'];
	$DueDate =  $_POST['DueDate'];
	
	$Linespace=array("","","","","","","","","","","","","","","","");
	$excel=new ExcelWriter("posRestockOrderReports".$date.".xls");
	if($excel==false){	
	echo $excel->error;
	}
			 
			$Title=array("","","","","RESTOCK REQUIREMENTS REPORT");
			$excel->writeLines($Title); 
			$excel->writeLine($Linespace);
			$excel->writeLine($Linespace);
			$parameterlist=array("PARAMETERS:","","","","","","","","","","","Report Date:",$dated);
			$excel->write($parameterlist);
			
         if ($empId=="ALL")
	{
		$empName=array("Employee Name :","ALL","","","","","","","","","","","","","","","");
		$excel->write($empName);
		$BookingDate=array("Booking Date :","$BookingDate","","","","","","","","","","","","","","","");
		$excel->write($BookingDate);
		$DueDate=array("Due Date :","$DueDate ","","","","","","","","","","","","","","","");
		$excel->write($DueDate);		
		$excel->writeLine($Linespace);
	    $empId = 'NULL';
	}
	else
	{
	    $empId=$_POST['EMP_ID'] ;
	}
		if ($_POST['EMP_ID'] != "ALL")
	        { 		
			   $pdo = Database::connect(); 
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$result = $pdo->prepare("SELECT ID,EMP_NAME FROM  EMP_DETAILS WHERE  ID = $empId");
				$result->execute();	
		       $row = $result->fetch();
			   
				    $empName=array("Employee Name :",$row['EMP_NAME'],"","","","","","","","","","","","","","","");
		            $excel->write($empName);
		            $BookingDate=array("Booking Date :","$BookingDate","","","","","","","","","","","","","","","");
		            $excel->write($BookingDate);
		            $DueDate=array("Due Date :","$DueDate ","","","","","","","","","","","","","","","");
		            $excel->write($DueDate);	
		            $excel->writeLine($Linespace);
			}
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $pdo->prepare("SELECT distinct emp.ID ID,emp.EMP_NAME EMP_NAME FROM EMP_DETAILS emp, pos_restock_order ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		AND emp.ID = IFNULL($empId, emp.ID)
		AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
		AND   ord.RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
        $result->execute();	
		for($i=0; $row = $result->fetch(); $i++)
		    {		
			  	 $empName=array("Employee Name :",$row['EMP_NAME'],"","","","","","","","","","","","","","","");
		         $excel->write($empName);	
			     $excel->writeLine($Linespace);
				 
				$emp_name=$row['EMP_NAME'];	
					
				$pdo = Database::connect(); 
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$resultri = $pdo->prepare("SELECT distinct clt.ID ClientId, clt.CLIENT_NAME CLIENT_NAME FROM EMP_DETAILS emp, CLIENT_DETAILS clt, POS_RESTOCK_ORDER ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		        AND clt.ID=ord.CLIENT_ID AND emp.ID = IFNULL($empId, emp.ID)	
				AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
	        	AND   ord.RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
				$resultri->execute();

                  			
					for($r=1; $rowr = $resultri->fetch(); $r++)
					{																	
						Database::disconnect();
					    $cltName=array("Client Name :",$rowr['CLIENT_NAME'],"","","","","","","","","","","","","","","");
		                $excel->write($cltName);	
			            $excel->writeLine($Linespace);
						
						$orderTitle=array("","Sl#","Product Code","Product Description","Qty","Due Date & Time","Special Instructions");
						$excel->writeLin($orderTitle);
						$OrdCnt = 0;
					    $clientid = $rowr['ClientId'];
						
							$pdo = Database::connect(); 
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$resultitv = $pdo->prepare("SELECT prod.PRODUCT_CODE PRODUCT_CODE, prod.DESCRIPTION PROD_DESCRIPTION,ord.ORDER_QTY ORDER_QTY,ord.RESTOCK_DUE_DATE RESTOCK_DUE_DATE,ord.RESTOCK_COMMENTS RESTOCK_COMMENTS
							FROM POS_RESTOCK_ORDER ord,PRODUCT_MASTER prod
							WHERE ord.BOOKING_EMPLOYEE_ID = $empId							
							AND   ord.CLIENT_ID = $clientid							
							AND   ord.PRODUCT_ID = prod.ID
							AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
	        	            AND   ord.RESTOCK_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.RESTOCK_DUE_DATE )");
							$resultitv->execute();		
                						
							for($j=1; $rowvit = $resultitv->fetch(); $j++)
							{		
                                
                              
								Database::disconnect();
								$orderDetails=array("",$j,$rowvit['PRODUCT_CODE'], $rowvit['PROD_DESCRIPTION'],$rowvit['ORDER_QTY'], $rowvit['RESTOCK_DUE_DATE'],$rowvit['RESTOCK_COMMENTS']);
								$excel->writeLine($orderDetails);
								
								$OrdCnt =  $OrdCnt +1;
							}
						
							if ($OrdCnt == 0) 
							{
							   $report=array("","","","","","**No Orders Found**");
							   $excel->writeLinee($report);
							} 
							
					}
						   
			}				
  echo '<script type="text/javascript">
						window.location.href = "posRestockOrderReports'.$date.'.xls";
						</script>';	
}				
ob_end_flush();
?>
			    <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/footer.php'); ?>
					<div class="dock-wrapper">    
							 <div class="navbar navbar-fixed-bottom">
								<div class="navbar-inner">
									<div class="container">                  
											<center>
												<div class="btn-group btn-group-justified">                      				
													<a href="../reports.php" class="btn btn-default">
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

			