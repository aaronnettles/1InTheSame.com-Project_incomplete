<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

$hostname_doDB = "";
$database_doDB = "";
$username_doDB = "";
$password_doDB = "";
$doDB = mysqli_connect($hostname_doDB, $username_doDB, $password_doDB, $database_doDB) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>
</body>
</html>