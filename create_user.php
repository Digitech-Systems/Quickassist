<?php 
include("html-head.php");
?>
</head>
<body> 
<?php 
if (isset($_POST["submit"]))
{
$name = $_POST["name"];
$company= $_POST["company"];
$uname = $_POST["username"];
$pass = strrev($_POST["pass1"]."digitech");
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$website= $_POST["website"];
$address= $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];

$user_pin =  substr(md5($pass),5,5);
### insert into table
query("myoffice", "insert into user (name, company, uname, pass, email, phno, city, state, address, website, user_pin) values 
('$name', '$company', '$uname', '$pass', '$email', '$mobile', '$city', '$state', '$address', '$website', '$user_pin')");


### fetch data from table
query("myoffice", "select * from user where uname='$uname';");
$newrow = mysqli_fetch_array($GLOBALS['result']);
$table_name = 'user_'.$newrow['user_id'];
$userdb = "userDB_".$newrow['user_id'];
### create database of user
$sq = "create database userDB_".$newrow['user_id'].";";
//echo $sq;

query("myoffice", $sq);
//echo mysqli_error($GLOBALS['con']);

### creating new table for pbook
query($userdb, "CREATE TABLE pbook (unique_sno int(11) NOT NULL AUTO_INCREMENT,
 Name char(150) DEFAULT NULL,
 Company char(150) DEFAULT NULL,
 Business char(150) DEFAULT NULL,
 Home char(150) DEFAULT NULL,
 Mobile char(150) DEFAULT NULL,
 Fax char(150) DEFAULT NULL,
 Email char(150) DEFAULT NULL,
 Website char(150) DEFAULT NULL,
 Street char(150) DEFAULT NULL,
 City char(150) DEFAULT NULL,
 State char(150) DEFAULT NULL,
 Pin_Number char(150) DEFAULT NULL,
 Country char(150) DEFAULT NULL,
 PRIMARY KEY (unique_sno));");


### creating new table for calender
query($userdb, "CREATE TABLE clock (
 sno int(11) NOT NULL AUTO_INCREMENT,
 due_date date NOT NULL,
 title char(50) NOT NULL,
 dis char(100) NOT NULL,
 start_time char(10) NOT NULL,
 end_time char(10) NOT NULL,
 type char(15) NOT NULL,
 cat char(10) NOT NULL,
 rept char(10) NOT NULL,
 priority char(15) NOT NULL,
 date_add timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 pending char(10) NOT NULL DEFAULT 'no',
 active char(3) NOT NULL DEFAULT 'yes',
 day_of_week char(10) NOT NULL,
 day_of_month char(2) NOT NULL,
 month char(2) NOT NULL,
 remind char(10) NOT NULL,
 PRIMARY KEY (sno)) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1");



### creating new formcode file
file_put_contents("user_forms/".$newrow['user_id']."form.php","");

### creating new subfolder for filemanager
if (!file_exists("userfiles/".$newrow['user_id']))
{
mkdir("userfiles/".$newrow['user_id']);
}

header("location:index.php");
}// end of main function
?>
<div class="container-fluid">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" role="form"  class="form-horizontal">
<fieldset style="width:500px; margin:auto;">
  <legend>Create New Account</legend>
  <div class="form-group">
  <label class="control-label col-xs-4" >Name</label>
  <div class="col-xs-8">
    <input type="text" name="name" class="form-control input-sm" style="width:200px;" required>
  </div></div>
 
  <div class="form-group">
  <label class="control-label col-xs-4" >Company</label>
  <div class="col-xs-8">
    <input type="company" name="company" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  
  <div class="form-group">
  <label class="control-label col-xs-4" >Username</label>
  <div class="col-xs-8">
    <input type="text" name="username" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >Password</label>
  <div class="col-xs-8">
    <input type="password" name="pass1" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >Re-enter password</label>
  <div class="col-xs-8">
    <input type="password" name="pass2" class="form-control input-sm" style="width:200px;" required>
  </div></div>
    <div class="form-group">
  <label class="control-label col-xs-4" >Mobile No.</label>
  <div class="col-xs-8">
    <input type="text" name="mobile" class="form-control input-sm" style="width:200px;" required>
  </div></div>

  <div class="form-group">
  <label class="control-label col-xs-4" >E-mail Address</label>
  <div class="col-xs-8">
    <input type="email" name="email" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >Website</label>
  <div class="col-xs-8">
    <input type="url" name="website" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >Address</label>
  <div class="col-xs-8">
    <textarea name="address" class="form-control input-sm" style="width:200px;" required> </textarea>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >City</label>
  <div class="col-xs-8">
    <input type="text" name="city" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <label class="control-label col-xs-4" >State</label>
  <div class="col-xs-8">
    <input type="text" name="state" class="form-control input-sm" style="width:200px;" required>
  </div></div>
  <div class="form-group">
  <div class="col-xs-6">
       <a href="index.php" class="btn btn-info form-control">Back</a>
    </div>
    <div class="col-xs-6">
      <input class="btn btn-info form-control"  type="submit" name="submit" value="Create" />
    </div>
    
  </div>
</fieldset>

<?php 
include("html-footer.php");
?>
