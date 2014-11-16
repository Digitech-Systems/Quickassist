<?php include("html-head.php"); ?>
<style>
#browse-file tr th, tr, td
{
	border:1px solid grey;
	padding:5px;
	text-align:center;
}

.fl {
	text-align:left;
}
</style>
</head>


<body>
<table id="browse-file">
<tr>
<th>Sno</th>
<th>File name</th>
<th>Type</th>
<th>Size</th>
<th>Extension</th>
<th>Date Modified</th>
</tr>

<?php 
$dir = "userfiles/".$srow["user_id"]."/";
// Open a directory, and read its contents
if (is_dir($dir)){
$file = scandir($dir);
}

$i = 1;
foreach($file as $key => $value)
{
	if ($key>1)
	{
		$path = pathinfo($dir.$value);
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td class=\"fl\">" . $value. "</td>";					//filename
		echo "<td>" .filetype($dir.$value). "</td>";	//type
		echo "<td>".filesize($dir.$value);	"</td>";	//filesize
		echo "<td>". $path['extension']."</td>";		//extention
		echo "<td>".date("F d Y H:i:s.",filemtime($dir.$value))."</td>";	//date modified			
		echo "</tr>";
		$i++;
	}
}
?>


<?php include("html-footer.php"); ?>