<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$hostname_doDB = "";
$database_doDB = "";
$username_doDB = "";
$password_doDB = "";
$doDB = mysql_connect($hostname_doDB, $username_doDB, $password_doDB) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db( '$database_doDB' );

?>

</body>
</html>