<?php 
session_start()
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
Welcome <?php echo
error_reporting(E_ALL); ini_set('display_errors', '1'); echo $_SESSION['lastname']; ?>
</head>


<body>
</body>
</html>