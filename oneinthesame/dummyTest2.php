

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$host="23.229.155.194"; // Host name 
$username="nettles"; // Mysql username 
$password="crowlove1"; // Mysql password 
$db_name="user_registration"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
 $nameFirst=$_POST['nameFirst'];
                       $nameLast=$_POST['nameLast'];
                       $newUserUsername=$_POST['username'];                       $newUserPassword=$_POST['password'];
                       $passwordRetype=$_POST['passwordRetype'];
                       $email=$_POST['email'];
                       $age=$_POST['age'];
                       $gender=$_POST['gender'];
                       $disorder=$_POST['disorder'];
                       $disability=$_POST['disability'];
                       $illness=$_POST['illness'];
                       $previousStory=$_POST['previousStory'];

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(nameFirst, nameLast, username, email, password, passowrdRetype, age, gender, disorder, disability, illness, previousStory)VALUES($nameFirst,'$nameLast', '$newUserPassword','$newUserUsername','$passwordRetype', '$email', '$age','$gender', '$disorder', '$disability','$illness','$previousStory')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='profile.php'>Back to main page</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>
</body>
</html>
<?php
mysql_free_result($Recordset2);
?>
