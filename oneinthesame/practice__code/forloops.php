<?php
$charaters= array ('ashley','john','aaron','josh','eric');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using for loops</title>
</head>

<body>
<h1> Letter List</h1>
<ul>
<?php
sort ($charaters);
for ($i=0;$i<count($charaters);$i++){
	echo '<li>'.$charaters[$i].'</li>';
}
	
?>
</ul>
</body>
</html>