<?php
session_start();
ob_start();
if(session_destroy())
{
header("Location: http://lastmilecrm.gaddieltech.com.mocha6005.mochahost.com/lastMileCRM/index.php");
}
?>