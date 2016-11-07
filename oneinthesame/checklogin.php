<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
$hostname_doDB = "";
$database_doDB = "";
$username_doDB = "";
$password_doDB = "";
$doDB = mysql_connect($hostname_doDB, $username_doDB, $password_doDB) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db( '$database_doDB' );

// email and password sent from form 
$myusername=$_POST['myemail']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM users WHERE email='$myemail' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myemail and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myemail");
session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>
</body>
</html>