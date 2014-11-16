<?php 
if (isset($_REQUEST['loc']))
{
	include("scripts/func.php");
	include("scripts/session.php");
	$to_del = $_REQUEST['loc'];
	query($userdb, "delete from {$GLOBALS['pbook']} where unique_sno='$to_del';");
	header("location:pbook-home.php");	
}//end of if

?>