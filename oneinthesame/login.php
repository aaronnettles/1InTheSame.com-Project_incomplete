<?php
ob_start();
session_start(); // Starting Session
error_reporting(E_ALL); ini_set('display_errors', '1');
//this function is created to make it faster to check & clean data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require "doDBi.php";
// To protect MySQL injection for Security purpose
$username =  test_input($username);
$password =  test_input($password);
// Selecting Database
//$db = mysqli_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($doDB, "select * from users where password='$password' AND username='$username'");
$rows = mysqli_num_rows( $query );
if ($rows == 1) {
$_SESSION['username']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($doDB); // Closing Connection
}
}

?>