<?php
include("/scripts/func.php");
include("/scripts/session.php");
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
if (($_SERVER['REQUEST_METHOD']=="GET") && (isset($_REQUEST['view'])))
{
$view = $_REQUEST['view'];
$btn_start = "<input type=\"button\" class=\"btn btn-danger btn-push\" value=\"Start\" />";
$btn_stop = "<input type=\"button\" class=\"btn btn-success btn-push\" value=\"Stop\" />";


$ac = $GLOBALS['dates'][$view];
$outPut = array();
$aa = date_create($GLOBALS['dates']["today"]);
$day_of_today = date_format($aa, "l");
$day_of_month = date_format($aa, "d");
$month = date_format($aa, "m");

if (($view == "today"))
{
query($userdb, "select * from {$clock} where due_date='$ac';");
}// if today tomoro yesterday or goto
else if (($view == "tomorrow") || ($view == "yesterday") || ($view == "goto"))
{
query($userdb, "select * from {$clock} where due_date='$ac' order by due_date,start_time ;");
}// if today tomoro yesterday or goto
else {
if (($view == "last_week") || ($view == "this_week") || ($view == "next_week"))
{
	$start =  $ac;
	$end = 	date("Y-m-d", strtotime($ac ." + 7 days"));
}
if (($view == "last_month") || ($view == "this_month") || ($view == "next_month"))
{
	$start = date("Y-m", strtotime($ac))."-01";
	$end =  date("Y-m-t", strtotime($ac));
}
if (($view == "last_year") || ($view == "this_year") || ($view == "next_year"))
{
	$start= $ac."-01-01";
	$end =  $ac."-12-31";
}

//echo $start  . "<br>". $end . "<br>" . $ac;
query($userdb, "select * from {$clock} where due_date between '$start' and '$end';");
echo mysqli_error($GLOBALS['con']);
} // end of else if today



while ($row = mysqli_fetch_array($GLOBALS['result']))
{
		array_push($outPut,$row);
}// end of while


//$row_count = mysqli_num_rows($GLOBALS['result']);

if ($view == "today") 
{

////////////// selecting daily repeting records//////////////
query($userdb, "select * from {$clock} where rept='daily' and active='yes' and due_date !='".$GLOBALS['dates']["today"]."';");
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($outPut,$row1);
}// end of while

////////////// selecting weekly repeting records /////////////
query($userdb, "select * from {$clock} where rept='weekly' and day_of_week='$day_of_today' and active='yes';");
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($outPut,$row1);
}// end of while


////////////// selecting week days records /////////////
if ($day_of_today != "Sunday"){
query($userdb, "select * from {$clock} where rept='weekdays' and active='yes';");
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($outPut,$row1);
}// end of while

}// end if today is not sunday

}// end of $view = today


////////////// selecting monthly repeting records /////////////
query($userdb, "select * from {$clock} where rept='monthly' and day_of_month='$day_of_month' and active='yes';");
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($outPut,$row1);
}// end of while

////////////// selecting yearly repeting records /////////////
query($userdb, "select * from {$clock} where rept='yearly' and day_of_month='$day_of_month' and month='$month' and active='yes';");
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($outPut,$row1);
}// end of while

###############################################################
#################                        ######################
############# final out put starts here########################
#################                        ######################
###############################################################

if (!empty($outPut))
{
// removing duplicate entries from multidimensional arrays
$outPut = array_map("unserialize", array_unique(array_map("serialize", $outPut))); 


 
     

	
echo '<h2>Today\'s Events</h2><div id="today-date">';
if (($view == "today") || ($view == "tomorrow") || ($view == "yesterday") || ($view == "goto"))
{
echo "<h4>" . date("d-m-Y", strtotime($GLOBALS['dates'][$view])) ." - ( ". date("l", strtotime($GLOBALS['dates'][$view])) ." ) "  . "</h4>";
}// if today tomoro yesterday or goto
else {
echo "<h4>"."From - : ".date("d-m-Y", strtotime($start)). " To " . date("d-m-Y", strtotime($end)) ."</h4>";
}
echo '</div> <!--end of today--> ';


echo	'<div class="table-responsive"><table class="table table-bordered table-hover" id="browse_table">
		<thead><tr>
		<th>Time</th>
		<th>Date</th>
		<!--<th>End Time</th>-->
		<th>Type</th>
		<th>Title</th>
		<th>Description</th>
		<th>Category</th>
		<th>Repeat</th>
		<th>Priority</th>
		<th></th>
		</tr>
		</thead>
		
		<tbody >	
        ';

	$cn = 0;
foreach ($outPut as $value)
{
	if($outPut[$cn]["rept"]!="never")
	{
	if($outPut[$cn]["active"]=='yes'){
	$btn = $btn_stop;}
	else {$btn = $btn_start;}
	}
	else 
	{
	$btn = "";
	}
	
if ($outPut[$cn]["priority"]=="Normal")	
{$tr_class="";}
else 
if ($outPut[$cn]["priority"]=="Important")	
{$tr_class="alert alert-info";}	
else
if ($outPut[$cn]["priority"]=="Most Important")	
{$tr_class="alert alert-danger";}
echo	'<tr class="'.$tr_class.'">

		<td>'.change_time($outPut[$cn]["start_time"]).'</td>
		<td>'.date("d-m-Y", strtotime($outPut[$cn]["due_date"])).'</td>
		
		
		<td>'.$outPut[$cn]["type"].'</td>
		<!--<td>'.$outPut[$cn]["end_time"].'</td>-->
		<td>'.$outPut[$cn]["title"].'</td>
		<td>'.$outPut[$cn]["dis"].'</td>
		<td>'.$outPut[$cn]["cat"].'</td>
		<td>'.$outPut[$cn]["rept"].'</td>
		<td>'.$outPut[$cn]["priority"].'</td>
		<td id="tr'.$outPut[$cn]["sno"].'">'. $btn .  '</td>
		</tr>';
//echo	"" .$outPut[$cn]["sno"] . "<br>";
//echo	"Due_date = " .$outPut[$cn]["due_date"] . "<br>";
$cn++;
}
echo "</tbody></table></div><!--end of table responsive-->";
		




}//end of if !=0


else 
{
	echo "<h4>No Entries Available</h4>";
}// end of row count = 0
//var_dump($outPut);

}// end of isset request method = get and $_REQUEST[ == view


if (($_SERVER['REQUEST_METHOD']=="GET") && (isset($_REQUEST['action'])) 	)
{
	$action = $_REQUEST['action'];
	$sno = substr($_REQUEST['recno'],2,3);
	
	if ($action == "Stop")
	{
		query($userdb, "update {$clock} set active='no' where sno='{$sno}'");
	echo "<input type=\"button\" class=\"btn btn-danger btn-push\" value=\"Start\" />";
	}
	else
	{
		query($userdb, "update {$clock} set active='yes' where sno='{$sno}'");
	echo "<input type=\"button\" class=\"btn btn-success btn-push\" value=\"Stop\" />";
	}

}// end of $action and request = get

?>