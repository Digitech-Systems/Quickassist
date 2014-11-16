<?php 
/*function link_sql()
{
$host = "localhost";
$user = "root";
$pass = "";
$db = "myoffice";
$GLOBALS['con'] = mysqli_connect($host,$user,$pass,$db);
}*/
$main_db = "myoffice";

function query($db,$str)
{
//link_sql();
$host = "localhost";
$user = "root";
$pass = "";
$dbase = $db;
$GLOBALS['con'] = mysqli_connect($host,$user,$pass,$dbase);

$GLOBALS['result'] = mysqli_query($GLOBALS['con'], $str);
}

$GLOBALS['dates'] = array(
				"today"=>date("Y-m-d"),
				"yesterday" => date("Y-m-d", strtotime("yesterday")),
				"tomorrow" => date("Y-m-d", strtotime("tomorrow")),
				"last_week" => date("Y-m-d", strtotime("last week")), //27
				"this_week" => date("Y-m-d", strtotime("this week")), //03
				"next_week" => date("Y-m-d", strtotime("next week")), //11
				"last_month" => date("M", strtotime("last month")),
				"this_month" => date("M", strtotime("this month")),
				"next_month" => date("M", strtotime("next month")),
				"last_year" => date("Y", strtotime("last year")),
				"this_year" => date("Y", strtotime("this year")),
				"next_year" => date("Y", strtotime("next year"))
				);
function show_drop($name, $id, $table, $field, $sele)
{
query("select {$field} from {$table}");

echo "<select name='$name' id='$id'>";
$i=0;
while ($row = mysqli_fetch_array($GLOBALS['result']))
{
	if ($sele == $row[$field])
	{
	$std = "selected=\"selected\"";	
	}
	else
	{
		$std = "";
	}
echo "<option value=\"{$row[$i]}\" {$std} >{$row[$i]}</option>\n";	
$i = $i++;
}
echo "</select>";	
}

function change_time($input_time)
{
// 23:24	
//break time
$hours = substr($input_time,0,2);
$mins = substr($input_time,3,2);


if (($hours > 11) && ($hours <= 24))
{
	if (($hours == 24))
	{
		$new_hour = "12";
		$part = "AM";
	}
	else {
		$new_hour = $hours - 12;
		if ($new_hour ==0){ $new_hour = 12;}
		if ($new_hour <10) { $new_hour = "0". $new_hour;}
		$part = "PM";
	}

}
else
{
	//$new_hour = $hours - 12;
	
$new_hour = $hours;
if ($new_hour ==0){ $new_hour = 12;}
	$part = "AM";
}


return $new_hour .":" . $mins ." " . $part ;
}
/*if (($hours == 24) && ($mins == 00))
{
$new_hour= "00";
$part = "AM";
} else */
?>