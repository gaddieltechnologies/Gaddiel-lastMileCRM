
<!-- saved from url=(0057)http://wbpreview.com/previews/WB01BG165/user-account.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>crM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/footable.core.css?v=2-0-1">
    <link rel="stylesheet" type="text/css" href="../../resources/css/footable-demos.css">
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<script src="../../resources/js/footable.js?v=2-0-1"></script>
	
    <!-- Google font -->
    <script>
        if (!window.jQuery) { document.write('<script src="../../resources/js/jquery-1.9.1.min.js"><\/script>'); }
    </script>
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/connection.php'); ?>
	<!-- Navbar -->
<style>
.oddtr
{
background-color:#FFFFFF;
}
.eventr
{
	background-color:#F5F5F5;
}
.trover
{
background-color: #81F781;
}
.trclick
{
	background-color: #7EC2EB;
}
	
</style>

<?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	<!-- /Navbar -->
	<form action="" method="POST" name="forms">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			<div class="box-container">
				
			</div>
			<!-- /Header boxes -->
			<!-- row boxes -->
			<div class="row">
			   <div class="span12 desktop">
				 <div class="widget">                 					
					<div class="widget-content "> 
						<div class="span8"><h3>Employee</h3></div>                       
						<div class="span3">                                                                
							<div class="box-holder">
                                 <a href="addEmployee.php" onClick="newPage()">
                                 <div class="box"><img src="../../resources/images/e-add.png"/></br>New</div></a>	
                            </div>                      						
							
							 <div class="box-holder">
							   <a href="../master.php">
							   <div class="box"><img src="../../resources/images/e-close.png"/></br>Close</div></a>							
                             </div>                          
						</div>
					</div>
				</div>								
			 </div>
				<!-- /Content -->
					<div class="span12">
					    <div class="widget">					
						<div class="widget-content">
							<div class="mobile"><h3>Employee Details</h3></div> 													
							<div class="span3"><input type="text" autofocus class="span3" placeholder="Search by Employee Name" id="searchEmployeeName" name="searchEmployeeName"/></div>
							<div class="span3"><input type="text"  class="span3" placeholder="Search by Designation "  id="DESIGNATION_ID" name="DESIGNATION"/></div>               
							<div class="span3"><input type="text" class="span3" placeholder="Search by Department " id="DEPARTMENT_ID" name="DEPARTMENT"/></div>                            							 
                            <div class="span2"><input type="submit" class="btn btn-success " onClick="searchvalue()" value="Search"> <a href="#" class="btn btn-success " onClick="clearvalue()">Clear</a></div>  							
									
							              
						</div>
					   </div>  
			  </div>  
				 <!------>
                <!-- /Content -->
				<div class="span12">
					<div class="widget-content">
						<div class="tab-content">
							<div class="tab-pane active" id="demo">
                              
							<table class="table demo table-bordered " data-filter="#filter" data-page-size="5"
							       data-page-previous-text="prev" data-page-next-text="next">
							<!--<table class="table table-striped table-bordered">-->                            
								<thead>
								<tr class="widget-header">
										<th></th>
										<th data-toggle="true">Employee Name</th>
										<th >Designation</th> 
										<th data-hide="phone,tablet">Department</th> 
										<th data-hide="phone,tablet">Mobile Num</th>
										<th data-hide="phone">Email Id</th>
										
									</tr>		
								</thead>
                                							
								<tbody id="gridvaluediv" class="mytable1">	
                               
                                 <?php 
								  
								  	$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$result = $pdo->prepare("SELECT emp.id ID, emp.emp_name EMP_NAME, design.DESIGNATION_NAME DESIGNATION_NAME, depart.DEPARTMENT_NAME DEPARTMENT_NAME, emp.mobile_num MOBILE_NUM, emp.email_id EMAIL_ID 
									FROM EMP_DETAILS emp, DESIGNATION design, DEPARTMENT depart
									WHERE design.ID = emp.designation_id AND depart.ID = emp.department_id ORDER BY emp.id DESC");
		                            $result->execute();
		                            Database::disconnect();	

									if ( !empty($_POST)) {	
								   
			                        $EMP_NAME = $_POST['searchEmployeeName'];
									 $DESIGNATION = $_POST['DESIGNATION'];
									$DEPARTMENT = $_POST['DEPARTMENT'];
									
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$sql="SELECT emp.id ID, emp.emp_name EMP_NAME, design.DESIGNATION_NAME DESIGNATION_NAME, depart.DEPARTMENT_NAME DEPARTMENT_NAME, emp.mobile_num MOBILE_NUM, emp.email_id EMAIL_ID 
									FROM EMP_DETAILS emp, DESIGNATION design, DEPARTMENT depart WHERE design.ID = emp.designation_id AND depart.ID = emp.department_id AND emp.emp_name LIKE :searchEmployeeName AND design.designation_name LIKE :DESIGNATION AND depart.department_name  LIKE :DEPARTMENT;";                   
									$result=$pdo->prepare($sql);
									$result->bindValue(':searchEmployeeName',$EMP_NAME.'%');
									$result->bindValue(':DESIGNATION',$DESIGNATION.'%');
									$result->bindValue(':DEPARTMENT',$DEPARTMENT.'%');
									$result->execute();
									}
		                            for($i=0; $row = $result->fetch(); $i++){																	
									Database::disconnect();
																	 
			 				      ?>										  
									<tr Style="cursor:pointer;">
                                      <td class="actions">										   
											<a href="editEmployee.php?id=<?php echo $row['ID']; ?>" class="btn btn-small  "><i class="icon-pencil"></i></a>
											<a href="deleteEmployee.php?id=<?php echo $row['ID']; ?>" class="btn btn-small " onclick="return confirm('Are you sure?')"><i class="icon-remove"></i></a>
										   
										</td>
									
										<td><?php  echo $row['EMP_NAME'];?></td>
										<td><?php  echo $row['DESIGNATION_NAME'];?></td>
                                        <td><?php  echo $row['DEPARTMENT_NAME'];?></td>
										<td><?php  echo $row['MOBILE_NUM'];?></td>
                                        <td><?php  echo $row['EMAIL_ID'];?></td>
																		
								</tr>
                                <?php }?>								  
								</tbody>
							</table>
							</div>			
						</div>
					</div>
				</div>          
                <!------>
			</div><!-- /row boxes -->
			
			<!-- Footer -->
		
			<?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/footer.php'); ?>
			<!-- /Footer -->
	 <!-- Navbar -->
    <div class="dock-wrapper row">    
        <div class="navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">                         
                       <center>
                         <div class="btn-group btn-group-justified">                     
                       <a href="addEmployee.php" class="newenable btn btn-default" onClick="newPage()" id="newenable">
                          	 <img src="../../resources/images/e-add.png"/><br>New</a>                       													 
						                       
						<a href="../master.php" class="btn btn-default">
                        	<img src="../../resources/images/e-close.png"/><br>Cancel</a>
					     </div>
                  </center>                        		
				</div>
           	</div>
		</div>
     </div>
	<!-- /Navbar -->
		</div>
		<!-- /Container -->
	</div>
	<!-- /Main content -->
    </form>
	
</body>
<!-- Javascript files -->
 <script type="text/javascript">
$(function(){
		//these two line adds the color to each different row
  
    $(".mytable1 tr:even").addClass("eventr");
    $(".mytable1 tr:odd").addClass("oddtr");

 	//handle the mouseover , mouseout and click event
  $(".mytable1 tr")  
  .mouseover(function() {$(this).addClass("trover");})
  .mouseout(function() {$(this).removeClass("trover");})
  //.click(function(){$(this).toggleClass("trclick");})
 // .click(function(){$(this).siblings().removeClass('trclick');});
 
 }); 
</script>
 <script type="text/javascript">
        $(function () {
            $('table').bind('footable_breakpoint', function() {
                $('table').trigger('footable_expand_first_row');
            }).footable();
        });
		
		
    </script>
<script type="text/javascript">
function clearvalue()
{
 
 document.getElementById("DESIGNATION_ID").value="";
 document.getElementById("searchEmployeeName").value="";
 document.getElementById("DEPARTMENT_ID").value="";
}
</script>

</html>