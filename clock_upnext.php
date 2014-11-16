<?php
include("scripts/func.php");
include("scripts/session.php");
###############################################################
#################                        ######################
################# adding upcoming events ######################
#################                        ######################
###############################################################
$up_event = array();  					// new array of upcoming events
$a1 = $GLOBALS['dates']["today"];								//today
$b1 = date("Y-m-d", strtotime("today + 7 days"));	// within 7 days
$c1	= date("Y-m-d", strtotime("today + 2 days"));	// within 2 days
$d1 = $GLOBALS['dates']['tomorrow'];
//one week events
query($userdb, "SELECT * FROM {$clock} WHERE remind='1-week' and due_date between '$a1' and '$b1' and active='yes'");
echo mysqli_error($GLOBALS['con']);
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($up_event,$row1);
}// end of while

// 2 days events3
query($userdb, "SELECT * FROM {$clock} WHERE remind='2-days' and due_date between '$a1' and '$c1' and active='yes'");
echo mysqli_error($GLOBALS['con']);
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($up_event,$row1);
}// end of while

//tomorrow
query($userdb, "SELECT * FROM {$clock} WHERE remind='1-day' and due_date = '$d1' and active='yes'");
echo mysqli_error($GLOBALS['con']);
while ($row1 = mysqli_fetch_array($GLOBALS['result']))
{
			array_push($up_event,$row1);
}// end of while



if (!empty($up_event))
{
	
echo '<h2> Upcomming Events </h2>';
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
		</tr>
		</thead>
		
		<tbody >	
        ';
		
		$cn = 0;
foreach ($up_event as $key)
{
	
if ($outPut[$cn]["priority"]=="Normal")	
{$tr_class="";}
else 
if ($outPut[$cn]["priority"]=="Important")	
{$tr_class="alert alert-info";}	
else
if ($outPut[$cn]["priority"]=="Most Important")	
{$tr_class="alert alert-danger";}
echo	'<tr class="'.$tr_class.'">
		<td>'.change_time($up_event[$cn]["start_time"]).'</td>
		<td>'.date("d-m-Y", strtotime($up_event[$cn]["due_date"])).'</td>
		<td>'.$up_event[$cn]["type"].'</td>
		<!--<td>'.$up_event[$cn]["end_time"].'</td>-->
		<td>'.$up_event[$cn]["title"].'</td>
		<td>'.$up_event[$cn]["dis"].'</td>
		<td>'.$up_event[$cn]["cat"].'</td>
		<td>'.$up_event[$cn]["rept"].'</td>
		<td>'.$up_event[$cn]["priority"].'</td>
		</tr>';	
	$cn++;
}
echo "</tbody></table></div><!--end of table responsive-->";
	
}
?>