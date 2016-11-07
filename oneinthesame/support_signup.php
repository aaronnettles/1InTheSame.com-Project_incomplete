<?php 
ob_start();
require_once('doDB.php');

error_reporting(E_ALL); ini_set('display_errors', '1');
 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (nameFirst, nameLast, username, password, passwordRetype, EMAIL) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nameFirst'], "text"),
                       GetSQLValueString($_POST['nameLast'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['passwordRetype'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_doDB, $doDB);
  $Result1 = mysql_query($insertSQL, $doDB) or die(mysql_error());

  $insertGoTo = "welcome.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_doDB, $doDB);
$query_Recordset1 = "SELECT * FROM users";
$Recordset1 = mysql_query($query_Recordset1, $doDB) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
ob_end_flush();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
    
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Support Member Sign Up</title>

</head>

<body>
<div align="center">
<img src="logo_with_banner/HomePage_longer_final_sign_up.gif" width="1331" height="142" usemap="#Map" border="0" />
<map name="Map" id="Map">
  <area shape="circle" coords="107,71,75" href="PhotoShop_1intheSame/HomePage_longer_final_new.html" />
</map>

<table width="1334" height="579">
  <tr>
    <th width="152" height="21" scope="col">&nbsp;</th>
    <th width="278" scope="col"></th>
    <th width="215" scope="col">&nbsp;</th>
    <th width="215" scope="col">&nbsp;</th>
    <th width="215" scope="col">&nbsp;</th>
    <th width="219" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="331" scope="row">&nbsp;</th>
    <td>
 <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <label for="accountType">
          <div align="left">First, select your reason for visiting 1inTheSame.com</div>
        </label>
        <div align="left">
          <select name="accountType" size="1" id="accountType" onchange="location = this.options[this.selectedIndex].value;">
            <option selected="selected" value="support_signup.php">To Support</option>
            <option value="help_needed_signup.php"> To Find Help</option>
            <option value="giving_help.php">To Help Someone</option>
          </select>
        </div>
        <p align="left">
          <label for="nameFirst">First Name:</label>
          <br />
          <input type="text" name="nameFirst" id="nameFirst" />
          <br />
          <label for="nameLast">Last Name:</label>
          <br />
          <input type="text" name="nameLast" id="nameLast" />
          <br />
          <label for="username">Username(For Authentication):</label>
          <br />
          <input name="username" type="text" id="username" maxlength="30" />
          <br />
          <label for="password">Password:</label>
          <br />
          <input name="password" type="password" id="password" maxlength="15" />
          <br />
          <label for="passwordRetype">Retype Password:</label>
          <br />
          <input name="passwordRetype" type="password" id="passwordReype" maxlength="15" />
          <br />
          <label for="email">Email Address:</label>
          <br />
          <input name="email" type="email" id="emial" maxlength="40" />
          <br />
        <input name="submit" type="submit" value="Create Account" />
      </p>
        <input type="hidden" name="MM_insert" value="form1" />
    </form>
    
    
    
    
    </td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td><table width="200" height="282" border="1">
      <tr>
        <th scope="col">Becoming a Free Suppport Memeber allows you to recommend stories and much more.</th>
      </tr>
      <tr>
        <th scope="row">Not only can you view stories, you can also comment and interact with Published Members.</th>
      </tr>
      <tr>
        <th scope="row"><p>Support Members help users that are looking for help with finding the right story. 1inTheSame.com salutes our Support Members.</p></th>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
