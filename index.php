<?php include("html-head.php"); ?>
<?php 

$uname = $pass = $unameErr = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$uname = $_POST["uname"];
$pass = $_POST["pass"];
	if (empty($uname))
	{
	$unameErr = "Please enter Correct Username";
	}
	if (empty($pass))
	{
	$passErr = "Please enter Correct Password";
	}
		$pass = strrev($pass."digitech");	
query("myoffice", "select * from user where uname='$uname' and pass='$pass'");
$row = mysqli_fetch_array($GLOBALS['result']);
$num_rows = mysqli_num_rows($GLOBALS['result']);
if ($num_rows ==1)
	{
	session_start();
	$_SESSION["user_id"] = $row['user_id'];
	header("location:quick-home.php");
	}// end of num rows
} // end of main function


?>
<script type="text/javascript">
$("document").ready(function(){
	function load_cap(){
		$("#cap_image").load("scripts/load_cap.php");
	}

$("body").ready(load_cap);	
$("#refBtn").ready(function(){
$("#refBtn").on("click", function(){
		load_cap();
		})// end of refbtn on click
});
}); // end of document.ready
function validate_login() {
	var uname = document.getElementById("uname").value;
	var pass = document.getElementById("pass").value;
	var cap = document.getElementById("capInput").value;
	var capVal = document.getElementById("capVal").value;
	var err = "";
	if (uname.length<1)
	{ 	var err = err + "Enter correct username <br>" ;	}
	if (pass.length <1)
	{ var err = err + "Enter Input Correct Password <br>"; }
	if (cap.length<1)
	{ var err = err + "Enter Code From Image <br>"; }
	else if (cap != capVal)
	{ var err = err + "Enter Correct Code from Image"; }
	
if (err != "")
{
	document.getElementById("errMsg").innerHTML = err;
	$("#myModal").modal('show');	
	return (false);
}
return (true);
}// end of validate login

</script>
<style type="text/css">
fieldset {
	width: 300px;
	margin: auto;
}
</style>
</head>

<body>
<div class="container">
<div class="page-header">
  <h1>Welcome To Quick Assist</h1>
</div>
<fieldset >
  <legend>Login</legend>
  <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data" onSubmit="return validate_login();" >
    <label>Username</label>
    <input type="text" name="uname" id="uname" class="form-control" />
    <?php echo $unameErr ?> <br />
    <label>Password </label>
    <input type="password" name="pass" id="pass" class="form-control" />
    <?php echo $passErr; ?> <br />
    <div id="captcha">
    <span id="cap_image" ></span>
    <button id="refBtn" type="button" title="Change Image" style="padding: 0px; height: 60px; width: 45px;"><img src="images/refresh.png" width="20" style="height: 40px; width: 40px; margin: 0px;"></button>
      <input type="text" id="capInput" name="capInput" maxlength="6" size="8" class="form-control" placeholder="Type Here from Image">
    </div>
    <br />
    <input class="btn btn-info form-control" type="submit" name="submit" value="Login" />
    <br />
    <br />
  </form>
  <a href="create_user.php">
  <button class="btn btn-info form-control">Create New Account</button>
  </a>
</fieldset>
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <p id="errMsg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<p id="cp"></p>
<?php include("html-footer.php"); ?>
