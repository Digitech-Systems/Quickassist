<!DOCTYPE html>
<html>
<head>
<title>Quick Assist</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/format-html.js"></script>
<script type="text/javascript" src="plugins/headroom/headroom.js"></script>
<!--<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>-->
<?php 
	include("/scripts/func.php");
	//include("/scripts/config.php");
	if ((basename($_SERVER['PHP_SELF']) !== "index.php") && (basename($_SERVER['PHP_SELF']) !== "create_user.php"))
	{
	include("/scripts/session.php");	
	}
	
ini_set('error_reporting', E_ALL);
	?>
