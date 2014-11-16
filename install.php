<?php 
include("config.php");
$con = mysqli_connect($serverName, $dbuser, $dbpass);
if (!$result = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS {$dbname};"))
{
echo "creating database";
}
//sleep(10); // sleep for 10 seconds	
if ($createuser = mysqli_query($gateway, "create table if not exists user (uname char(30), 
passport char(30));"))
{
echo "User Table Created<br>";
}
if ($createuser = mysqli_query($gateway, "create table if not exists mydir (date datetime NOT NULL);"))
{
echo "User Table Created<br>";
}
?>