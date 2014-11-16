<?php 
include_once("func.php");
session_start();
if (!isset($_SESSION['user_id']))
{
header("location:index.php");
}
else
{
$user_id = $_SESSION['user_id'];

query("myoffice", "select * from user where user_id='$user_id';");
$user = mysqli_fetch_array($GLOBALS['result']);
//$pbook = 'user_'.$user['user_id'];


### all user instances are here#########
$GLOBALS['form_code'] = "user_forms/".$user['user_id']."form.php";  // customise form code
//$clock = "clock_".$user['user_id'];
$clock = "clock";											// clock table
$pbook = "pbook";											//pbook table
$userdb = "userDB_".$user['user_id'];						// user database name
$userdir = "userfiles/".$user['user_id'];						// user files
}
