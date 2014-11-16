<?php include("html-head.php"); ?>
<!--<script type="text/javascript" src="plugins/table/jquery-latest.js"></script>-->

<!--<script type="text/javascript" src="plugins/table/jquery.tablesorter.min.js"></script> 
<script type="text/javascript" src="plugins/table/jquery.tablesorter.pager.js"></script> 
<link href="plugins/table/blue-style.css" rel="stylesheet" />
-->

<style type="text/css">
#browse_table {
	margin-top: 10px;
	margin-left: 10px;
	border: 1px solid grey;
	border-collapse: collapse;
}
#browse_table tbody tr td, #browse_table thead tr th {
	border: 1px solid grey;
	padding: 4px;
	padding-right: 30px;
	min-width: 110px;
}
#browse_table tbody tr td div {
	overflow: hidden;
	height: 22px;
}
#effect {
	border: 2px solid grey;
}
div.tablesorterPager {
	padding: 10px 0 10px 0;
	background-color: #D6D2C2;
	text-align: center;
}
div.tablesorterPager span {
	padding: 0 5px 0 5px;
}
div.tablesorterPager input.prev {
	width: auto;
	margin-right: 10px;
}
div.tablesorterPager input.next {
	width: auto;
	margin-left: 10px;
}
div.tablesorterPager input {
	font-size: 8px;
	width: 30px;
	border: 1px solid #330000;
	text-align: center;
}
div#pager {
	margin: 0px;
}
.listLabel {width:40px; font-size:28px; font-weight:500; color:white; margin:3px; text-align:center; margin-right:10px;}
.listA {background-color:#7D0552}
.listB {background-color:#000080}
.listC {background-color:#008080}
.listD {background-color:#254117}
.listE {background-color:#C11B17}
.listF {background-color:#E4287C}
.listG {background-color:#7D1B7E}
.listH {background-color:#583759}
.listI {background-color:#4CC417}
.listJ {background-color:#F62817}
.listK {background-color:#C12283}
.listL {background-color:#8C001A}
.listM {background-color:#806517}
.listN {background-color:#E9AB17}
.listO {background-color:#483C32}
.listP {background-color:#6F4E37}
.listQ {background-color:#7F5217}
.listR {background-color:#E67451}
.listS {background-color:#7D0552}
.listT {background-color:#F62817}
.listU {background-color:#E9AB17}
.listV {background-color:#842DCE}
.listW {background-color:#FF00FF}
.listX {background-color:#F62817}
.listY {background-color:#FFA62F}
.listZ {background-color:#4CC417}


.listbox{text-height:font-size; font-size:24px; }
#listNav li {
	width:38px;
	
	font-weight:600;
	color:white;
}
</style>
<style type="text/css">
.scroll-area {
	height: 450px;
	position: relative;
	overflow: auto;
	margin-left:50px;
}

</style>
<script type="text/javascript">
$("document").ready(function(){
	/*$("div.col-xs-8 > input").hover(function(){
		$(this).attr("disabled","disabled");
	}); */
	
	//$("#browse_table").tablesorter(); 

   /* $("table").tablesorter({
		widthFixed: true, widgets: ['zebra']})
		.tablesorterPager({container: $("#pager")
			});
$("#dir_dash").headroom();
$( "#btt" ).click(function() {
	$( "#dir_dash" ).slideToggle(500,"swing");
})*/
});
</script>
</head>
<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="quick-home.php">Quick Assist</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="quick-home.php">Home</a></li>
                    <li><a role="button" data-toggle="modal" data-target="#AddNewModal">Add</a></li>
                    <li><a href="pbook-cust.php">Customise</a></li>
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $user['uname']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav><!--end of titel nav bar-->
    
<?php
/*
pg1:

################## TABLE HEADER STARTS HERE ################
$oldtable = array();
//$result = mysqli_query($gateway, "show columns from {$GLOBALS['table_name']};");
query("show columns from {$GLOBALS['pbook']};");

while ($otable = mysqli_fetch_array($GLOBALS['result']))
{
array_push($oldtable, $otable['Field']);	
}

mysqli_free_result($result);
echo "<table id=\"browse_table\" class=\"tablesorter\" >";
echo "<thead><tr>";

foreach ($oldtable as $key => $table_cols)
{
	if ($key != 0)
	{
	echo "<th>".str_replace("_"," ",$table_cols)."</th>";
	}

}
echo "<th>Edit</th>";
echo "<th>Delete</th>";
echo "</thead> <tbody>";


########### TABLE HEADER ENDS HERE ########################

//$result_2 = mysqli_query($gateway, "SELECT * from {$GLOBALS['table_name']};");
query("SELECT * from {$GLOBALS['pbook']};");
while ($row = mysqli_fetch_row($GLOBALS['result']))	
{
	echo "\n <tr> \n";
	foreach ($row as $key => $fld)
	{
		if ($key != 0)
		{
		echo "<td title=\"{$row[$key]}\" ><div data-toggle=\"tooltip\" data-placement=\"left\">".$row[$key]."</div></td>";		
		}
	
	}// end of foreach

echo "<td><a title=\"Edit Contact\" href=\"pbook-edit.php?loc=".$row[0]."\"><button class=\"btn btn-info btn-sm\" title=\"Edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button></a></td>";
echo "<td><a title=\"Delete Contact\" href=\"pbook-del.php?loc=".$row[0]."\"><button class=\"btn btn-info btn-sm\" title=\"Delete\"><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";

	echo " \n </tr> \n";
	
	
}//end of while statement

echo "</tbody></table>";*/
?>

<!--<div class="col-md-3" ></div>
<div class="col-md-6" >
<div id="pager" class="">
	<form>
   		<button class="btn btn btn-primary first">First</button> 
  		<button class="btn btn btn-primary prev">Previous</button> 
		<input type="text" class="pagedisplay"/>
   		<button class="btn btn btn-primary next">Next</button> 
  		<button class="btn btn btn-primary last">Last</button> 

		<select class="pagesize dropdown">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
    
</div>
</div>
<div class="col-md-3"></div>  
-->  
<nav id="myNavbar" class="navbar navbar-default navbar-inverse" role="navigation"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
            <!--<a class="navbar-brand" href="#">Scrollspy</a>-->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul id="listNav" class="nav navbar-nav">
                <li class="active"><a href="#listA">A</a></li>
                <li><a href="#listB">B</a></li>
                <li><a href="#listC">C</a></li>
                <li><a href="#listD">D</a></li>
                <li><a href="#listE">E</a></li>
                <li><a href="#listF">F</a></li>
                <li><a href="#listG">G</a></li>
                <li><a href="#listH">H</a></li>
                <li><a href="#listI">I</a></li>
                <li><a href="#listJ">J</a></li>
                <li><a href="#listK">K</a></li>
                <li><a href="#listL">L</a></li>
                <li><a href="#listM">M</a></li>
                <li><a href="#listN">N</a></li>
                <li><a href="#listO">O</a></li>
                <li><a href="#listP">P</a></li>
                <li><a href="#listQ">Q</a></li>
                <li><a href="#listR">R</a></li>
                <li><a href="#listS">S</a></li>
                <li><a href="#listT">T</a></li>
                <li><a href="#listU">U</a></li>
                <li><a href="#listV">V</a></li>
                <li><a href="#listW">W</a></li>
                <li><a href="#listX">X</a></li>
                <li><a href="#listY">Y</a></li>
                <li><a href="#listZ">Z</a></li>
                
            </ul>
        </div>
    </nav>
    <div class="scroll-area " data-spy="scroll" data-target="#myNavbar" data-offset="0">
        
		<?php 
		$first = "A";
		$i=0;
//		echo "<h3 id =\"list".$first."\">".$first."</h3>";
//		echo ucwords($row['Name']) ;					
//(substr(ucwords($row['Name']),0,1)==$first)
		
		for ($i=1; $i<=26; $i++)
			{
			echo "<h3 id =\"list{$first}\"><span class=\"btn btn-lg btn-primary badge\">{$first}</span></h3>";
			query($userdb, "select * from {$pbook} where Name like '{$first}%' order by Name");
			while ($row = mysqli_fetch_array($GLOBALS['result']))
			{
			//echo "<div class=\"listbox\"><label class=\"listLabel list{$first}\">{$first}</label>"; 
			//echo substr(ucwords($row['Name']),0,1);
			$list_id = "ct".$row["unique_sno"];
			echo "<div class=\"panel panel-default\" style=\"margin-top:0px; margin-bottom:0px;\">
    <div class=\"panel-heading\" role=\"tab\" id=\"heading{$list_id}\">
      <h4 class=\"panel-title\">
        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$list_id}\" aria-expanded=\"true\" aria-controls=\"collapse{$list_id}\">
          <div class=\"listbox\"><label class=\"listLabel list{$first}\">{$first}</label>".ucwords($row["Name"])."</div>
        </a>
      </h4>
    </div>
    <div id=\"collapse{$list_id}\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading{$list_id}\">
      <div class=\"panel-body\">";
			echo "this is body";
			echo "</div><!--end of pannel body--></div></div><!--end of pannel {$first}-->";
			}
			$first++;
			}// end of foreach

?>

	
       
    </div><!--end of scroll area-->


</div><!--end of container-->
<!-- Add New Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <form action="pbook-add.php" method="post" enctype="multipart/form-data" role="form"  class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
        </div>
        <div class="modal-body">
       
<fieldset style="width:500px; margin:auto;"><legend>Add New Record</legend>
<?php include("pbook-form.php"); ?>
<?php include($GLOBALS['form_code']); ?>
</fieldset>

        </div>
        <!--end of modal body-->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" Value="Add" class="btn btn-primary" />
        </div>
        <!--end of modal footer-->
      </form>
    </div>
    <!--end of modal content--> 
  </div>
</div><!--end of add new modal-->
<?php include("html-footer.php") ?>
