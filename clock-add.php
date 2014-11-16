<?php 

if ( 	($_SERVER['REQUEST_METHOD']== "POST") && (isset($_POST['event-date']))		)
{
include("/scripts/func.php");
include("/scripts/session.php");
$due_date =  $_POST['event-date'];
$title = $_POST['event-title'];
$dis = $_POST['event-desc'];
$start = $_POST['event-start'];
$remind = $_POST['event-remind'];

//$end = $_POST['event-end'];
$end = "";
$type = $_POST['event-type'];
$cat =	$_POST['event-cat'];
$rept = $_POST['event-repeat'];
$prior = $_POST['event-priority'];
$aa = date_create($_POST['event-date']);
$day_of_week =  date_format($aa, "l");	// day saturday sunday etc
$month =  date_format($aa, "m");	// month 01-12
$day_of_month  = date_format($aa, "d");		// day of month 0-31
/*
echo $date;
echo "<br>";
echo $title;
echo "<br>";
echo $dis;
echo "<br>";
echo $start;
echo "<br>";
echo $end;
echo "<br>";
echo $type;
echo "<br>";
echo $cat;
echo "<br>";
echo $rept;
echo "<br>";
*/
query($userdb, "insert into ".$clock." 
(due_date, title, dis, start_time, end_time, type, cat, rept, priority, day_of_week, day_of_month, month, remind) 
values 
('$due_date', '$title', '$dis', '$start', '$end', '$type', '$cat', '$rept', '$prior', '$day_of_week', '$day_of_month', '$month', '$remind');");
header("location:clock.php");
//echo mysqli_error($GLOBALS['con']);
//echo $due_date;
//echo $remind;

}
else 
echo "<h1>Access to this Page is denied</h1>";
?>