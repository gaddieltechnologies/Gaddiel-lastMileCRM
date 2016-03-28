<?php
session_start();
ob_start();
?>
<!-- Navbar -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span Class="desktop pull-right">&nbsp;&nbsp;LAST MILE CRM</span></a>
				<a class="brand" style="font-size:12px;"/><span Class="mobile pull-right">&nbsp;&nbsp;LAST MILE CRM</span></a>
				<div class="mobile">           		
						<ul class="nav pull-right">					
					 <li class="divider-vertical"></li>
					 <li><a href="http://lastmilecrm.gaddieltech.com.mocha6005.mochahost.com/lastMileCRM/logout.php"><i class="icon-unlock"></i></a></li>
					 <li class="divider-vertical"></li>
					</ul>
				</div>
				<div class="nav-collapse">
					<ul class="nav pull-right">
					 <li class="divider-vertical"></li>
					 <li><a href="http://lastmilecrm.gaddieltech.com.mocha6005.mochahost.com/lastMileCRM/logout.php"><i class="icon-unlock"></i>&nbsp;&nbsp;Logout</a></li>
					 <li class="divider-vertical"></li>
					</ul>
				</div>
				
			</div>
		</div>
<?php
	 
	
       /* if(empty($_SESSION['USER_NAME'])){
		
		echo '<script type="text/javascript">
			window.location.href = "http://lastmilecrm.gaddieltech.com.mocha6005.mochahost.com/lastMileCRM/index.php";
			</script>';
			}	
			*/
		 /*$_SESSION['start'] = time(); // taking now logged in time
		 
			if(!isset($_SESSION['expire'])){
					$_SESSION['expire'] = $_SESSION['start'] + (30* 60) ; // ending a session in 5 mintues
				}
				$now = time(); // checking the time now when home page starts

				if($now > $_SESSION['expire'])
				{
					session_destroy();
					echo '<script type="text/javascript">
						window.location.href = "http://lastmilecrm.gaddieltech.com.mocha6005.mochahost.com/lastMileCRM/index.php";
						</script>';
				}*/
				

?>
	</div>
	<!-- /Navbar -->