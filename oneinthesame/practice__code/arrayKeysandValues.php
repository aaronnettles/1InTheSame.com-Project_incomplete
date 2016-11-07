<?php
$charaters= array ('ashley'=>' gorgeous'
                  ,'john'=>' awesome'
				  ,'aaron'=>' better than them all'
				  ,'josh'=>' a toe licker'
				   ,'eric'=>' funny');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using for loops</title>
</head>

<body>
<h1> Descriptions</h1>
<?php
foreach ($charaters as $key=>$description) {
	echo "<p> $key is$description.</p>";
}
	
?>
</body>
</html>