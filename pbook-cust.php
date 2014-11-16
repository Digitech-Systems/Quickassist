<?php include("html-head.php") ?>
<style type="text/css">
#stage {
	border: 1px solid grey;
	width: 640px;

	padding: 10px;
	overflow: scroll;
}
#toolbox {
	border: 1px solid grey;
	height: 400px;
	width: 300px;
	position:fixed;
	top:30px;
	left:700px;
}
.tool {
	margin: 10px;
	height: 30px;
	width: 120px;
}
.elem:hover {
	border: 2px solid green;
}
.elem {
	border-radius: 10px;
	padding: 10px;
	margin: 10px;
	overflow:auto;
	}
</style>
<?php 
$oldcode = null;
if (file_exists($GLOBALS['form_code']))
{
$oldcode = file_get_contents($GLOBALS['form_code']);	
}


if (isset($_POST["mydiv"]))
{

$newtable = array("unique_sno"); //array for new table
$oldtable = array(); // array for old table
$toadd = array();
$todelete = array();

foreach ($_POST["label"] as $key => $value) {
	array_push($newtable, str_replace(" ", "_", trim($value)));  // adding new table fields to array
//    echo 'label   '. $key . str_replace(" ", "_", trim($value)) ."<br>";
		}



/*
######checking array push
foreach ($newtable as $tt)
{
echo $tt."<br>";	
}
*/
query($userdb, "show columns from {$pbook};");

while ($otable = mysqli_fetch_array($GLOBALS['result']))
{
array_push($oldtable, $otable['Field']);	
}
//$addcol = mysqli_query($gateway,"alter table mydir add unique_sno int AUTO_INCREMENT PRIMARY KEY first");


#######getting fields to be added to old table ##########
$toadd = array_diff($newtable,$oldtable); 	// comparing new table against old table
foreach ($toadd as $dd1)
{
	//echo $dd1 . "<br>";
	$addcol= query($userdb, "alter table {$pbook} add {$dd1} char(150)");
		
}

#######getting fields to be deleted from old table ##########
$todelete = array_diff($oldtable,$newtable); // comparing old table against new table
foreach ($todelete as $dd2)
{
	//echo $dd . "<br>";
		$delcol= query($userdb, "alter table {$pbook} drop {$dd2}");
}


file_put_contents($GLOBALS['form_code'], trim($_POST["mydiv"]));
$form_code = file_get_contents($GLOBALS['form_code']);
	/*if ($form_code == "")
	{
		header("location:pbook-cust.php");
	}
	else 
	{
	header("location:pbook.php");
	}*/
	header("location:pbook-home.php");
}
?>
<script type="text/javascript">

$("document").ready(function(){
	/*$("div.col-xs-8 > input").hover(function(){
		$(this).attr("disabled","disabled");
	}); */
function show_opt() {
$('#myTab a[href="#prop"]').tab('show');
var div_id =$(this).attr("id");

var fld_label = $(this).children("label").html();
var fld_size = $("div.col-xs-8 :text").css("width");
$("#div_id").val(div_id);
$("#fldLabel").val(fld_label);
$("#fldLabel").focus(); 
$("#fldLabel").select();
//alert(fld_size);
}
$("body").on( "click", ".elem", show_opt);

$("body").on( "mouseover", ".elem", function(){$(this).css("cursor","pointer");});

$("#delElem").click(function(){
	$('#myTab a[href="#tools"]').tab('show');
	var toDel = "#" + $("#div_id").val();
	$("div").remove(toDel);
});


$("#saveElem").click(function(){
	var toSave = "#" + $("#div_id").val();
	var aa = $(toSave).index();
	$(toSave).children("label").html( $("#fldLabel").val()) ;
	$(toSave).find(":hidden").val($("#fldLabel").val()) ;
	$('#myTab a[href="#tools"]').tab('show');
	});

// add text box
$("#addText").click(function(){
	var elemNo = $("#all_form div.form-group").length;
	alert(elemNo);
	var txt = '<div id="div' + elemNo + '" class="form-group elem"> <label class="control-label col-xs-4" for="post[' + elemNo + ']">Label</label>  <div class="col-xs-8" id="childDiv'  + elemNo + ' ">    <input type="hidden" name="label['+ elemNo + ']" value="Label">    <input type="text" name="post['+ elemNo + ']" id="post['+ elemNo + ']" class="form-control" style="width:200px;">  </div>';
	$("#myform").append(txt);

	})

$("#addTextbox").click(function(){
	var elemNo = $("#all_form div.form-group").length;
	var txt = '<div id="div' + elemNo + '" class="form-group elem"> <label class="control-label col-xs-4" for="post[' + elemNo + ']">Label</label>  <div class="col-xs-8" id="childDiv'  + elemNo + ' ">    <input type="hidden" name="label['+ elemNo + ']" value="Label"> <textarea name="post['+ elemNo + ']" id="post['+ elemNo + ']" class="form-control" style="width:200px;"></textarea>  </div>';
	$("#myform").append(txt);
	})

$("#addDate").click(function(){
	var elemNo = $("#all_form div.form-group").length;
	var txt = '<div id="div' + elemNo + '" class="form-group elem"> <label class="control-label col-xs-4" for="post[' + elemNo + ']">Label</label>  <div class="col-xs-8" id="childDiv'  + elemNo + ' ">    <input type="hidden" name="label['+ elemNo + ']" value="Label">    <input type="date" name="post['+ elemNo + ']" id="post['+ elemNo + ']" class="form-control" style="width:200px;">  </div>';
	$("#myform").append(txt);
	})

$("#addEmail").click(function(){
	var elemNo = $("#all_form div.form-group").length;
	var txt = '<div id="div' + elemNo + '" class="form-group elem"> <label class="control-label col-xs-4" for="post[' + elemNo + ']">Label</label>  <div class="col-xs-8" id="childDiv'  + elemNo + ' ">    <input type="hidden" name="label['+ elemNo + ']" value="">    <input type="Email" name="post['+ elemNo + ']" id="post['+ elemNo + ']" class="form-control" style="width:200px;">  </div>';
	$("#myform").append(txt);
	})

$("#addWebsite").click(function(){
	var elemNo = $("#all_form div.form-group").length;
	var txt = '<div id="div' + elemNo + '" class="form-group elem"> <label class="control-label col-xs-4" for="post[' + elemNo + ']">Label</label>  <div class="col-xs-8" id="childDiv'  + elemNo + ' ">    <input type="hidden" name="label['+ elemNo + ']" value="Label">    <input type="url" name="post['+ elemNo + ']" id="post['+ elemNo + ']" class="form-control" style="width:200px;">  </div>';
	$("#myform").append(txt);
	})

}); // end of document ready function


function update_myform()
{
var oldhtml = document.getElementById("oldform").innerHTML;	
var newhtml = document.getElementById("myform").innerHTML;
document.getElementById("myformdiv").value = oldhtml + newhtml;
}//end of update_myform()

function reset_form()
{
	document.getElementById("myformdiv").value = "";
	document.getElementById("oldform").value = "";
	document.getElementById("myform").value = "";
}// end of reset_form()
</script>
</head>

<body>
<div class="container-fluid">
  <div id="toolbox" >
    <ul class="nav nav-tabs" role="tablist" id="myTab">
      <li class="active"><a href="#tools" role="tab" data-toggle="tab">Add Field</a></li>
      <li><a href="#prop" role="tab" data-toggle="tab">Field Properties</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tools">
        <button class="tool btn btn-primary btn-sm" id="addText">Single Line Text</button>
        <button class="tool btn btn-primary btn-sm" id="addTextbox">Paragraph Text</button>
        <br />
        <button class="tool btn btn-primary btn-sm" id="addDate">Date</button>
        <button class="tool btn btn-primary btn-sm" id="addName">Name</button>
        <br />
        <button class="tool btn btn-primary btn-sm" id="addEmail">E mail</button>
        <button class="tool btn btn-primary btn-sm" id="addWebsite">Website</button>
        <br />
      </div>
      <!--end of tools tab-->
      
      <div class="tab-pane" id="prop">
        <input type="hidden" id="div_id" name="div_id" />
        <label>Field Label</label>
        <input type="text" class="form-control" name="fldLabel" id="fldLabel"/>
        <label>Field Size</label>
        <select class="form-control" name="fldSize" id="fldSize">
          <option value="150">Small</option>
          <option value="300">Medium</option>
          <option value="450">Large</option>
        </select>
        <button class="btn btn-danger btn-primary btn-md form-control" id="delElem" >Delete</button>
        <br />
        <br />
        <button class="btn btn-success btn-primary  btn-md form-control" id="saveElem">Save</button>
      </div>
      <!--end of properties tab--> 
      
    </div>
    <!--
    
<button class="tool" onclick="addInput('text')">Text Box</button><button class="tool" onclick="addInput('text')">Textarea</button>
<br />
<button class="tool" onclick="addInput('checkbox')">Checkbox</button><button class="tool" onclick="addInput('radio')">Radio Buttons</button>
<br />
<button class="tool" onclick="addInput('password')">Password</button><button class="tool" onclick="addInput('date')">Date</button>
<br />
<button class="tool" onclick="addInput('file')">File</button><button class="tool" onclick="addInput('')">Drop Drown</button>
<br />
<button class="tool" onclick="addInput('radio')">List Box</button><button class="tool" onclick="addInput('radio')">Multiple Select</button>
<br />

    --> 
  </div>
  <!--end of toolbox-->
  <div id="stage">
    <form name="mycustomform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="all_form" enctype="multipart/form-data">
    <div class="hidden" style="display:none">
      <?php include("pbook-form.php"); ?>
</div><!--end of hidden div of fixed form-->
      <div id="oldform"><?php //echo $oldcode ?> </div>
      <div id="myform"><?php echo $oldcode ?> </div><!--end of myform-->
      
      <input type="hidden" value="" name="mydiv" id="myformdiv" />
      <input class="btn btn-info form-control" type="submit" value="Save Form" onClick="update_myform();" />
      <button class="btn btn-info form-control" onClick="reset_form();">Reset Form</button>
    </form>
  </div>
  <!--end of stage--> 
  
</div>
<?php include("html-footer.php") ?>