<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1>Register</h1>
<form method="POST" action="<?php echo $editFormAction; ?>" name="registration">
  <label> Username:</label><br/>
<input type="text" name="username"required="required" /><br/>
<label> Password:</label><br/>
<input type="password" name="password"required="required" /><br/>
<label> Email:</label><br/>
<input type="email" name="email"required="required" /><br/>
<input type="submit" value="Register"required="required" /><br/>
<input type="hidden" name="MM_insert" value="registration" />
</form>
Already have an account? <a href="login.php">Login!</a>
</body>
</html>
<?php
mysql_free_result($User_Request);
?>
