<?php
ob_start();
include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php');
require_once("../excelwriter.class.php");
	$dt = new DateTime();
	$date = $dt->format("Y-m-d-H-i-s");
	$dte = new DateTime();
	$dated = $dte->format("d-M-y");
	$empId=$_POST['EMP_ID'] ;
	$BookingDate =  $_POST['BookingDate'];
	$DueDate =  $_POST['DueDate'];
	
	$Linespace=array("","","","","","","","","","","","","","","","");
	$excel=new ExcelWriter("orderDetailsReports".$date.".xls");
	if($excel==false){	
	echo $excel->error;
	}
			 
			$Title=array("","","","","ORDER BOOKED REPORT");
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
	    $empId=$_SESSION['EMP_ID'] ;
	}
		if ($_SESSION['EMP_ID'] != "ALL")
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
		$result = $pdo->prepare("SELECT distinct emp.ID ID,emp.EMP_NAME EMP_NAME FROM EMP_DETAILS emp, ORDER_DETAILS ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		AND emp.ID = IFNULL($empId, emp.ID)
		AND ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
	    AND ord.DELIVERY_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.DELIVERY_DUE_DATE)");
        $result->execute();	
		for($i=0; $row = $result->fetch(); $i++)
		    {		
			  	 $empName=array("Employee Name :",$row['EMP_NAME'],"","","","","","","","","","","","","","","");
		         $excel->write($empName);	
			     $excel->writeLine($Linespace);
				 
				$emp_name=$row['EMP_NAME'];	
					
				$pdo = Database::connect(); 
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$resultri = $pdo->prepare("SELECT distinct clt.ID ClientId, clt.CLIENT_NAME CLIENT_NAME FROM EMP_DETAILS emp, CLIENT_DETAILS clt, ORDER_DETAILS ord WHERE emp.ID=ord.BOOKING_EMPLOYEE_ID
		        AND clt.ID=ord.CLIENT_ID AND emp.ID = IFNULL($empId, emp.ID)	
				AND ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
		        AND ord.DELIVERY_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.DELIVERY_DUE_DATE)");
				$resultri->execute();

                  			
					for($r=1; $rowr = $resultri->fetch(); $r++)
					{																	
						Database::disconnect();
					    $cltName=array("Client Name :",$row['CLIENT_NAME'],"","","","","","","","","","","","","","","");
		                $excel->write($cltName);	
			            $excel->writeLine($Linespace);
						
						$orderTitle=array("Sl#","Product Code","Product Description","Qty","Due Date & Time","Special Instructions");
						$excel->writeLin($orderTitle);
						$OrdCnt = 0;
					    $clientid = $rowr['ClientId'];
						
							$pdo = Database::connect(); 
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$resultitv = $pdo->prepare("SELECT prod.PRODUCT_CODE PRODUCT_CODE, prod.DESCRIPTION PROD_DESCRIPTION,ord.ORDER_QTY ORDER_QTY,ord.DELIVERY_DUE_DATE DELIVERY_DUE_DATE,ord.SPECIAL_INSTRUCTIONS SPECIAL_INSTRUCTIONS
							FROM ORDER_DETAILS ord,PRODUCT_MASTER prod
							WHERE ord.BOOKING_EMPLOYEE_ID = $empId							
							AND   ord.CLIENT_ID = $clientid							
							AND   ord.PRODUCT_ID = prod.ID
							AND   ord.BOOKING_DATE >= IFNULL((str_to_date('$BookingDate','%d-%b-%y')), ord.BOOKING_DATE )
		                    AND   ord.DELIVERY_DUE_DATE >= IFNULL((str_to_date('$DueDate','%d-%b-%y')), ord.DELIVERY_DUE_DATE)");
							$resultitv->execute();		
                						
							for($j=1; $rowvit = $resultitv->fetch(); $j++)
							{		
                                
                              
								Database::disconnect();
								$orderDetails=array($j,$rowvit['PRODUCT_CODE'], $rowvit['PROD_DESCRIPTION'],$rowvit['ORDER_QTY'], $rowvit['DELIVERY_DUE_DATE'],$rowvit['SPECIAL_INSTRUCTIONS']);
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
						window.location.href = "orderDetailsReports'.$date.'.xls";
						</script>';									
							
?>							
							