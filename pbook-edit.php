<?php include("html-head.php") ?>
<?php 

$loc = null;

if (isset($_POST["submit"]))
{

$loc = $_POST["loc"];
	
$allPost = array();	
$allLabel = array();

####### storing all post values in array##############
foreach ($_POST["post"] as $key => $value)
		{
		array_push($allPost, $value);  // adding all post inputs to array
		}

####### storeing all label names in array #############
foreach ($_POST["label"] as $key => $value)
		{
		array_push($allLabel, $value);  // adding all post inputs to array
		}


$sql = "UPDATE {$GLOBALS['pbook']} SET "; 
$cnt = 0;
$rc=count($allLabel)-1;
foreach ($allLabel as $key => $value)
		{
		
		if ($key !=0)
		{
		$sql = $sql . str_replace(" ","_",$allLabel[$cnt]) ."=". "\"".$allPost[$cnt]."\"";
			if ($key<$rc)
			{
			$sql = $sql . ", "  ;
			}
		$cnt++;
		}
		}

$sql = $sql . " where unique_sno=\"$loc\";";


query($userdb, $sql);
header("location:pbook-home.php");
}// end of main funciton submit 

if (isset($_REQUEST['loc']))
{

$to_edit = $_REQUEST['loc'];

//$result = mysqli_query($gateway, "select * from {$GLOBALS['table_name']} where unique_sno='$to_edit';");
query($userdb, "select * from {$GLOBALS['pbook']} where unique_sno='$to_edit';");
$edit_row = mysqli_fetch_row($GLOBALS['result']);
echo "<script>";
echo "$(document).ready(function(){";
$arr_count = count($edit_row);
foreach ($edit_row as $key => $fld)
	{
		$initial = $key-1;
	if  ($key != 0)
	{
	echo "var cc = document.getElementById(\"post[{$initial}]\").value=\"{$fld}\"; \n";
	}
	}// end of foreach
echo "});";
echo "</script>";
}// end of requested if

?>
<style type="text/css">
#add-dir
{
width:500px;	
}
</style>
</head>

<body>
<div class="container-fluid">
<?php //echo $sql." " .$rc; 
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" role="form"  class="form-horizontal">
<fieldset style="width:500px; margin:auto;"><legend>Edit Record</legend>
<?php include("user_forms/".$_SESSION['user_id']."form.php") ?>
<div class="form-group">
<div class="col-xs-12">
<input type="hidden" value="<?php echo $to_edit ?>" name="loc" />
<input class="submit" type="submit" name="submit" value="Save" />
</div>
</div>
</fieldset>
</form>
<?php include("html-footer.php") ?>