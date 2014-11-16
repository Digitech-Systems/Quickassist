<?php include("html-head.php"); ?>


<?php 
$vie = array(
				"today"=>date("d-m-Y"),
				"yesterday" => date("d-m-Y", strtotime("yesterday")),
				"tomorrow" => date("d-m-Y", strtotime("tomorrow")),
				"last_week" => date("d-m-Y", strtotime("last week")), //27
				"this_week" => date("d-m-Y", strtotime("this week")), //03
				"next_week" => date("d-m-Y", strtotime("next week")), //11
				"last_month" => date("F", strtotime("last month")),
				"this_month" => date("F", strtotime("this month")),
				"next_month" => date("F", strtotime("next month")),
				"last_year" => date("Y", strtotime("last year")),
				"this_year" => date("Y", strtotime("this year")),
				"next_year" => date("Y", strtotime("next year"))
				);
?>

<style type="text/css">
.norm
{
background-color:green;	
}
td{
	font-size:16px;
}
</style>
<script type="text/javascript">
$("document").ready(function(){

	
$("#AddNewForm").submit(function(){
	$('#AddNewModal').modal('hide');
	//$("#AddNewForm").trigger("reset");
	})

$("body").ready(function(){
var str = "clock_show.php?view=<?php echo "today"; ?>";
$("#todo").load(str);
$("#upnext").load("clock_upnext.php");


$("#today").click(function(){	
var str = "clock_show.php?view=<?php echo "today"; ?>";
$("#todo").load(str);
});//end of today click

$("#yesterday").click(function(){	
var str = "clock_show.php?view=<?php echo "yesterday"; ?>";
$("#todo").load(str);
});//end of yesterday click

$("#tomorrow").click(function(){	
var str = "clock_show.php?view=<?php echo "tomorrow"; ?>";
$("#todo").load(str);
});//end of tomorrow click

$("#last_week").click(function(){	
var str = "clock_show.php?view=<?php echo "last_week"; ?>";
$("#todo").load(str);
});//end of today click

$("#this_week").click(function(){	
var str = "clock_show.php?view=<?php echo "this_week"; ?>";
$("#todo").load(str);
});//end of today click

$("#next_week").click(function(){	
var str = "clock_show.php?view=<?php echo "next_week"; ?>";
$("#todo").load(str);
});//end of today click

$("#last_month").click(function(){	
var str = "clock_show.php?view=<?php echo "last_month"; ?>";
$("#todo").load(str);
});//end of today click

$("#this_month").click(function(){	
var str = "clock_show.php?view=<?php echo "this_month"; ?>";
$("#todo").load(str);
});//end of today click

$("#next_month").click(function(){	
var str = "clock_show.php?view=<?php echo "next_month"; ?>";
$("#todo").load(str);
});//end of today click


$("#last_year").click(function(){	
var str = "clock_show.php?view=<?php echo "last_year"; ?>";
$("#todo").load(str);
});//end of today click

$("#this_year").click(function(){	
var str = "clock_show.php?view=<?php echo "this_year"; ?>";
$("#todo").load(str);
});//end of today click

$("#next_year").click(function(){	
var str = "clock_show.php?view=<?php echo "next_year"; ?>";
$("#todo").load(str);
});//end of today click

});//end of body.ready
$("body").on("click", ".done", function(){ alert($(this).val())});
$("body").on("click", ".btn-push", function(){
	var act = $(this).val();
	var recno = $(this).parent("td:parent").attr("id");
	var str = "clock_show.php?action="+act+ "&recno=" +recno ;
	var td = "#"+ recno;
	$(td).load(str);
	 });

$("#appointment").click(function(){
	var tr_len =$("body").find("#browse_table tbody tr").length;

	var table_arr = [];
	for ( var i = 0; i < tr_len; i++ )
		{
		table_arr[i] = $("body").find("#browse_table tbody tr td:nth-child(4)").text();
		console.log(table_arr[i]);
		}
	
	for ( var i = 0; i < table_arr.length; i++ )
		{
		console.log(table_arr[i] + "\n") ;
		}
	
	
	
		for ( var i = 0; i < tr_len; i++ )
		{
		//table_arr[i] = $("body").find("#browse_table tbody tr td:nth-child(4)").text();
		if (table_arr[i] == "Appointment")
			{
				var cc = "#browse_table tbody tr:nth-child("+i+")";
			$("body").find("#browse_table tbody tr:nth-child("+i+")").hide();	
			console.log(cc);
			}
		}

	//alert(rr);
	})
	


});// end of document.ready


</script>
</head><body>

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
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">View<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<li><a id="today">Today</a></li>
                            <li><a id="yesterday">Yesterday</a></li>
                            <li><a id="tomorrow">Tomorrow</a></li>
                            <li class="divider"></li>
                            <li><a id="last_week">Last Week</a></li>
                            <li><a id="this_week">This Week</a></li>
                            <li><a id="next_week">Next Week</a></li>
                            <li class="divider"></li>
                            <li><a id="last_month">Last Month</a></li>
                            <li><a id="this_month">This Month</a></li>
                            <li><a id="next_month">Next Month</a></li>
                            <li class="divider"></li>
                            <li><a id="last_year">Last Year</a></li>
                            <li><a id="this_year">This Year</a></li>
                            <li><a id="next_year">Next Year</a></li>
                            <li class="divider"></li>
                            <li><a id="all">All</a></li>
                        </ul>
                    </li><!--end of view list-->
                     <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<li><a id="appointment">Appointments</a></li>
                            <li><a id="meeting">Meetings</a></li>
                            <li><a id="thingstodo">Things To Do</a></li>
                            <li><a id="remainder">Remainder</a></li>
                            <li><a id="birthday">Birthday</a></li>
                            <li><a id="aniversary">Aniversary</a></li>
                        </ul>
                    </li><!--end of categories-->
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
    
<div id="content" class="col-md-12" >
<div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingtoday">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#panneltoday" aria-expanded="false" aria-controls="today">
          <h4>Today events</h4>
        </a>
      </h4>
    </div>
    <div id="panneltoday" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingtoday">
      <div class="panel-body">

  <div id="todo">

  </div> <!--end of todo-->
  </div>
 </div><!--end of pannel-->
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingupnext">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#pannelupnext" aria-expanded="false" aria-controls="today">
          <h4>Upcomming events</h4>
        </a>
      </h4>
    </div>
    <div id="pannelupnext" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingupnext">
      <div class="panel-body">
      <div id="upnext">	</div>
  </div>
 </div><!--end of pannel-->

  

</div><!--end of pannel group-->
<?php 
//echo change_time("22:10");
?>
</div><!--end of content-->

<!-- Add New Modal -->
<div class="modal modal-lg fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="clock-add.php" id="AddNewForm" enctype="multipart/form-data" method="post" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-xs-4" >Title</label>
            <div class="col-xs-8">
              <input type="text" autofocus class="form-control"  name="event-title" id="event-title" placeholder="Title" required/>
            </div>
          </div>
          <!--end of form group--><br>
        <div class="form-group">
            <label class="control-label col-xs-4" >Date and Time</label>
            <div class="col-xs-4">
            <input type="date" class="form-control" name="event-date" id="event-date" placeholder="End Time" required />
              </div>
            <div class="col-xs-4">              
              <input type="time" class="form-control"  name="event-start" id="event-start" placeholder="Start Time" required/>
            </div>
          </div>
          <!--end of form group--><br>
        	<div class="form-group">
            <label class="control-label col-xs-4" >Type</label>
            <div class="col-xs-8">
              <select class="form-control" name="event-type" id="event-type" required="required">
              <option value="">Please Select</option>
              <option value="Appointment">Appointment</option>
              <option value="Meeting">Meeting</option>
              <option value="To-do">To-Do</option>
              <option value="Remiander">Remiander</option>
              <option value="Birthday">Birthday</option>
              <option value="Aniversary">Aniversary</option>
              </select>
            </div>
          </div>
          <!--end of form group--><br>
          <div class="form-group">
            <label class="control-label col-xs-4" >Priority</label>
            <div class="col-xs-8">
              <select class="form-control" name="event-priority" id="event-priority" >
              <option class="bg-success" value="Normal">Normal</option>
              <option class="bg-info" value="Important">Imoportant</option>
              <option class="bg-danger" value="Most Important">Most Important</option>
              </select>
            </div>
          </div>
          <!--end of form group--><br>

        	<div class="form-group">
            <label class="control-label col-xs-4" >Remind</label>
            <div class="col-xs-8">
              <select class="form-control" name="event-remind" id="event-remind">
              <option value="None">None</option>
              <option value="1-day">1 Day Before</option>
              <option value="2-days">2 Days Before</option>
              <option value="1-week">1 Week Before</option>
              </select>
            </div>
          </div>
          <!--end of form group--><br>
          
          <div class="form-group">
            <label class="control-label col-xs-4" >Description</label>
            <div class="col-xs-8">
              <input type="text" class="form-control"  name="event-desc" id="event-desc" placeholder="Description" />
            </div>
          </div>
          <!--end of form group--><br>
          <!--<div class="form-group">
            <label class="control-label col-xs-4" >Start Time</label>
            <div class="col-xs-8">
              <input type="time" class="form-control"  name="event-start" id="event-start" placeholder="Start Time" required/>
            </div>
          </div>
          <!--end of form group-><br>-->
          <!--<div class="form-group">
            <label class="control-label col-xs-4" >End Time</label>
            <div class="col-xs-8">
              <input type="time" class="form-control" name="event-end" id="event-end" placeholder="End Time" required/>
            </div>
          </div>
          <!--end of form group-><br>-->
          <div class="form-group">
            <label class="control-label col-xs-4" >Category</label>
            <div class="col-xs-8">
            <select name="event-cat" class="form-control" id="event-cat">
            <option value="Business">Business</option>
            <option Value="Personal">Personal</option>
            </select>
            </div>
          </div>
          <!--end of form group--><br>
          <div class="form-group">
            <label class="control-label col-xs-4" >Repeat</label>
            <div class="col-xs-8">
              <select class="form-control" name="event-repeat" id="event-repeat">
              <option value="never">Never</option>
              <option value="daily">Daily</option>
              <option value="weekdays">Week Days (Monday - Saturday)</option>
              <option value="weekly">Weakly</option>
              <option value="monthly">Monthly</option>
              <option value="yearly">Yearly</option>
              </select>
            </div>
          </div>
          <!--end of form group--><br>
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
</div>
<?php include("html-footer.php"); ?>
