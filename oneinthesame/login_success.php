<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();

echo "First name is " . $_SESSION["nameFirst"] . ".<br>";
echo "Last name is " . $_SESSION["nameLast"] . ".";
?>

<html>
<body>
Login Successful
</body>
</html>