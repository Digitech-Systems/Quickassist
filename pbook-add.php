<?php include("html-head.php") ?>
<?php 
if (isset($_POST["submit"]))
{


$oldtable = array(); // array for old table
//$result = mysqli_query($gateway, "show columns from {$GLOBALS['table_name']};");
query($userdb, "show columns from {$pbook};");
while ($otable = mysqli_fetch_array($result))
{
array_push($oldtable, $otable['Field']);	
}


	
$newPost = array();	
foreach ($_POST["post"] as $key => $value)
		{
		array_push($newPost, $value);  // adding all post inputs to array
		}

		
$sql = "insert into {$pbook} ("; 
foreach ($oldtable as $key => $value1) {

	$rc = count($oldtable)-1;
	if ($rc == $key)
	{
		$sql = $sql.$value1.") values (";
	}
	else if (($rc > $key) && ($key !=0))
	{
		  $sql = $sql.$value1.", ";
	}
	
}// end of foreach


foreach ($newPost as $key => $value) {

	$rc = count($newPost)-1;
	if ($rc == $key)
	{
		$sql = $sql."'".$value."'".")";
	}
	else 
	{
	$sql=$sql."'".$value."',";
	}
	
}// end of foreach

//echo $sql;
//$result=mysqli_query($gateway, $sql);
query($userdb, $sql);
header("location:pbook-home.php");
}// end of main funciton submit 
?>
</head>

<body>
<div class="container-fluid">
<?php //echo $sql; echo $rc; ?>
</div><!--end of container fluid-->
<?php include("html-footer.php") ?>