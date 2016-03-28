<!-- saved from url=(0057)http://wbpreview.com/previews/WB01BG165/user-account.html -->


<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>crM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
   
    <!-- CSS files -->
   <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.css">
    <script>
        if (!window.jQuery) { document.write('<script src="../../resources/js/jquery-1.9.1.min.js"><\/script>'); }
    </script>
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
	<script type="text/javascript">
function clearform()
{
    document.getElementById('view').value="";
}
</script>
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
	
	 <?php include($_SERVER['DOCUMENT_ROOT'].'/lastMileCRM/header.php'); ?>
	<!-- Main content -->
	<form action="" method="POST" onSubmit="return Validate();">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">	
	
			<div class="span12" >	
<h1 class="page-title">Geo Classification<label class="pull-right"><a href="../master.php"><h5><font color="#FFFFFF">Back to Dash Board</font></h5></a> </label></h1>
				<div class="row" >	
				<center>
                    <img src="../../resources/images/under_construction.jpg" width="500px"/>	
				</center>
						<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
				</div> 
			</div> 
        </div>
	 </div>	
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
  document.getElementById("ClientCode").value="";
 document.getElementById("ClientName").value="";
 document.getElementById("ClientLocation").value="";
 document.getElementById("SEcode").value="";


 }
</script>


</html>