<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require "doDBi.php";
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($doDB, "select username from users where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($doDB); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>