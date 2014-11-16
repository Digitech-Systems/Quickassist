<?php
include('scripts/func.php');
include('scripts/session.php');
$form_code = file_get_contents("user_forms/".$srow['user_id']."form.php");
	/*if ($form_code == "")
	{
		header("location:pbook-cust.php");
	}
	else 
	{
	header("location:pbook-home.php");
	}
	*/
?>
