<?php
ob_start();
//report all errors
error_reporting(E_ALL);
require ('doDB.php');
mysqli_query($doDB, "SELECT * FROM users");

$query = "INSERT INTO users (nameFirst, nameLast) VALUES('firstname', 'lastname')";
if(mysqli_query($doDB, $query)){
	header("mainpage.php");
}
else
{
	echo "not successful" . mysqli_error($query, $doDB);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" id="user" onSubmit="<?php echo $query?>" >
Please Enter your First Name: <br>
<input type="text" name= "firstname"id="firstname">
<br>
Please Enter your Last Name: <br>
<input type="text" name="lastname" id="lastname">

<input type="submit" name="Submit">

</form>
</body>
</html>