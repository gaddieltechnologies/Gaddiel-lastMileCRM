
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

	<!-- /Navbar -->
	
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
			<!-- /Header boxes -->
			<form action="" method="POST" name="forms">
			<!-- row boxes -->
			<div class="row">
			   <div class="span12 desktop">
				 <div class="widget">                 					
					<div class="widget-content "> 
						<div class="span8"><h3>Client Classification</h3></div>                       
						<div class="span3">                                                                
							<div class="box-holder">
                                 <a href="addClientClassification.php" onClick="newPage()">
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
							<div class="mobile"><h3>Client Classification</h3></div> 						
							                      
							<div class="span5"><input type="text" autofocus class="span5" placeholder="Search by Client Category" id="searchclientcategory" name="searchclientcategory"/></div>                            							 
                           <div class="span4"><input type="text" class="span4" placeholder="Search by Client Class" id="searchclientclass" name="searchclientclass"/></div>   
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
                                       
										<th data-toggle="true">Client Category</th>
                                        <th data-hide="phone,tablet">Client Class</th>
										<th data-hide="phone">Client Description</th>                                    
										
									</tr>		
								</thead>
									   				
								<tbody id="gridvaluediv" class="mytable1">	                              
								 <?php 
								    $pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									 $result = $pdo->prepare("select clfn.ID ID,  catg.CLIENT_CATEGORY CLIENT_CATEGORY, ccls.CLIENT_CLASS CLIENT_CLASS,clfn.DESCRIPTION DESCRIPTION
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_CATEGORY catg,
									 CLIENT_CLASS ccls
									 WHERE  clfn.CLIENT_CATEGORY_ID = catg.ID
									 AND    clfn.CLIENT_CLASS_ID = ccls.ID ORDER BY clfn.ID DESC");
		                            $result->execute();	                          																
									Database::disconnect();	
										
								if ( !empty($_POST)) {	

			                        $CLIENT_CLASS = $_POST['searchclientclass'];
									$CLIENT_CATEGORY = $_POST['searchclientcategory'];			                      							
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$sql="select clfn.ID ID,  catg.CLIENT_CATEGORY CLIENT_CATEGORY, ccls.CLIENT_CLASS CLIENT_CLASS,clfn.DESCRIPTION DESCRIPTION
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_CATEGORY catg,
									 CLIENT_CLASS ccls
									 WHERE  clfn.CLIENT_CATEGORY_ID = catg.ID
									 AND    clfn.CLIENT_CLASS_ID = ccls.ID  AND ccls.CLIENT_CLASS LIKE :searchclientclass AND  catg.CLIENT_CATEGORY LIKE :searchclientcategory ORDER BY clfn.ID ASC";
									$result=$pdo->prepare($sql);
									
									$result->bindValue(':searchclientclass',$CLIENT_CLASS.'%');
									$result->bindValue(':searchclientcategory',$CLIENT_CATEGORY.'%');
									$result->execute();
									}
		                            for($i=0; $row = $result->fetch(); $i++){																	
									Database::disconnect();	                                   										 
			 				      ?>		  
									<tr Style="cursor:pointer;">
                                       <td class="actions">
											<a href="editClientClassification.php?id=<?php echo $row['ID']; ?>" class="btn btn-small "><i class="icon-pencil"></i></a>
											<a href="deleteClientClassification.php?id=<?php echo $row['ID']; ?>" class="btn btn-small " onclick="return confirm('Are you sure?')"><i class="icon-remove"></i></a>
										</td>
								
										<td><?php  echo $row['CLIENT_CATEGORY'];?></td>
										<td><?php  echo $row['CLIENT_CLASS'];?></td>
                                        <td><?php  echo $row['DESCRIPTION'];?></td>						
										
									
									</tr>
                                  <?php } ?>
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
                       <a href="addClientClassification.php" class="newenable btn btn-default" onClick="newPage()" id="newenable">
                          	 <img src="../../resources/images/e-add.png"/><br>New</a>                       													 
						                       
						<a href="../master.php" class="btn btn-default">
                        	<img src="../../resources/images/e-close.png"/><br>Cancel</a>                              </div>
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
  
  document.getElementById("searchclientclass").value="";
  document.getElementById("searchclientcategory").value="";
 }
</script>

</html>