<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myoffice = "localhost";
$database_myoffice = "myoffice";
$username_myoffice = "root";
$password_myoffice = "";
$myoffice = mysql_pconnect($hostname_myoffice, $username_myoffice, $password_myoffice) or trigger_error(mysql_error(),E_USER_ERROR); 
?>