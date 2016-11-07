<?php
//ob is for the header, allowing it not to be sent
ob_start();
session_start();
include 'doDBi.php';
//define variables and set empty values
$ageErr = $conditionErr = $emailErr = $lastErr = $firstErr = $passErr = $genderErr = $previousErr = $userErr = $pass2Err = "";
$age = $disability = $disorder = $illness = $email = $lastname = $firstname = $pass = $gender = $previousStory = $username = $pass2= "";
//check if they are already logged in
if(isset($_SESSION["username"])){
	header("location: message.php?msg=You are already a member.");
    exit();
	}
	//catch any errors
error_reporting(E_ALL); ini_set('display_errors', '1');
	
//add an if statment to post data from the form
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	
	//check for error, and if there's no errors, declare values	
	if(empty($_POST['firstname'])){
		$firstErr="First Name is Required";
		
	}
	else
	{
		$firstname= test_input($_POST['firstname']);
	}
	if(empty($_POST['lastname'])){
		$lastErr="Last Name is Required";
		
	}
	else
	{
	$lastname= test_input($_POST['lastname']);
	}
	if(empty($_POST['pass'])){
		$passErr="Please enter a Password";
		
	}
	else
		{
		$pass= test_input($_POST['pass']);
		}
		if(empty($_POST['pass2'])){
		$pass2Err="Please enter a Password";
		
	}
	else
		{
		$pass2= test_input($_POST['pass2']);
		}
	if(empty($_POST['username'])){
		$userErr="Please Enter a Username for Authenication";
		
	}
	else
	{
	$username= test_input($_POST['username']);
	}
	if(empty($_POST['email'])){
	$emailErr="Email is Required";
	
	}
	else
	{
	$email= test_input($_POST['email']);
	}
	if(empty($_POST['age'])){
		$ageErr="Age is Required";
		
	}
	else
	{
	$age= test_input($_POST['age']);
	}
	if(empty($_POST['gender'])){
		$gender="";
	}
	else
	{
	$gender= test_input($_POST['gender']);
	}
	if(empty($_POST['disorder'])){
		$disorder="";
	}
	else
	{
	$disorder= test_input($_POST['disorder']);
	}
	if(empty($_POST['disability'])){
		$disability="";
	}
	else
	{
	$disability= test_input($_POST['disability']);
	}
	if(empty($_POST['illness'])){
		$illness="";
	}
	else
	{
	$illness= test_input($_POST['illness']);
	}
	if(empty($_POST['previousStory'])){
		$previousErr="Your Story is Required";
		
	}
	else
	{
	$previousStory= test_input($_POST['previousStory']);
	}
	$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	//if statement for conditions if nothing is selected
	if($illness = "" && $disability = "" && $illness = "")
	{
		$conditionErr="At Least One Condition is Required. Select Unknown if condition isn't there.";
		
	}
} 
	if (isset($_POST['firstname'])!=""&&$_POST['lastname']!=""&&$_POST['pass']!=""&&$_POST['username']!=""&&$_POST['email']!=""&&isset($_POST['age'])!=""&&$_POST['previousStory']!="") {
mysqli_query($doDB,"SELECT * FROM users");
$sql= "INSERT INTO users (nameFirst, nameLast,password,username,EMAIL,age,gender,disorder,disability,illness,storyPrevious,ip,signup,lastlogin,notescheck)
 VALUES('$firstname', '$lastname','$pass', '$username','$email','$age','$gender','$disorder','$disability','$illness','$previousStory','$ip',now(),now(),now())";
	
   if(mysqli_query($doDB, $sql))
	  {
	   header("location: practice3.php");
	  }
	$_SESSION['firstname']=$firstname;
	$_SESSION['lastname']=$lastname;
	$_SESSION['username']=$username;
	$_SESSION['storyPrevious']=$storyPrevious;
	}

//this function is created to make it faster to check & clean data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>
<span class="error">* required field.</span> <br>
       <label for="accountType">
First, select your reason for visiting 1inTheSame.com
        </label>
        <div align="left">
          <select name="accountType" size="1" id="accountType" onchange="location = this.options[this.selectedIndex].value;">
            <option selected="selected" value="help_needed_signup.php">To Seek Help</option>
             <option value="help_needed_signup.php"> To Find Help</option>
            <option value="giving_help.php">To Help Someone</option>
          </select>
        </div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="user" >
Please Enter a Username for Authenication:
<br>
<input name="username" type="text" maxlength="20">
<span class="error">* <?php echo $userErr;?></span>
<br>
Please Enter your First Name: 
<br>
<input type="text" name= "firstname"id="firstname">
<span class="error">* <?php echo $firstErr;?></span>
<br>
Please Enter your Last Name: <br>
<input type="text" name="lastname" id="lastname">
<span class="error">* <?php echo $lastErr;?></span>
<br>
Please Enter a Password:
<br>
<input type="password" name="pass">
<span class="error">* <?php echo $passErr;?></span> 
        <br>   
          <label for="passwordRetype">Retype Password:</label>
          <br />
          <input name="pass2" type="password" id="passwordReype" maxlength="15" />
          <span class="error">* <?php echo $pass2Err;?></span>
          <br />
          <label for="email">Email Address:</label>
          <br />
          <input name="email" type="email" id="email" maxlength="40">
          <span class="error">* <?php echo $emailErr;?></span>
          <br />
          <br />
          <label for="<?php $value ?>">Age:<br />
          </label>
          <select name="age"> 
            <?php 
for($value = 1; $value <= 100; $value++){ 
    echo('<option value="' . $value . '">' . $value . '</option>');
}
?>
          </select>
          <span class="error">* <?php echo $ageErr;?></span>
        </p>
        <p align="left"><br />
          <label for="gender"> Gender:</label>
          <br />
          <label>
            <input type="radio" name="gender" value="male" id="gender_0" >
            
            Male</label>
          <br />
          <label>
            <input type="radio" name="gender" value="female" id="gender_1" />
            Female</label>
          <br />
        </p>
        <span class="error">* <?php echo $conditionErr;?></span>
        <p align="left"> Now, please select the condition you have(Medical Contition, Disability, ect).<br />
        You may select multiple problems. </p>
        <p align="left"><br />
          <label for="disorder">Disorders:</label>
        </p>
        <p align="left">
          <select name="disorder" multiple="multiple">
            <?php require "conditions/disorder.html";
			?>
          </select>
        </p>
        <p align="left">
          <label for="disability">Physical Disabilities:</label>
        </p>
        <p align="left">
          <select name="disability" multiple="multiple">
            <?php require "conditions/disability.html"; ?>
          </select>
        </p>
        <p align="left">
          <label for="illness">Illness:<br />
          </label>
          <select name="illness" multiple="multiple">
<?php require "conditions/illness.html";
			?>
          </select>
        </p>
        <p align="left"> Now, what is your story? What is your condition and how do you feel? How did you first discover your condition?  Remember, 1inTheSame.com Anonymous Member can only be viewed by the users they connect with so be as honest as possible.</p>
        <p align="left">
        <span class="error">* <?php echo $previousErr;?></span>
          <textarea name="previousStory" rows="12" cols="60" id="previousStory" requiredplaceholder="Tell Your Story Here..." ></textarea>
        </p>
         <br>
<input type="submit" name="submit" value="Submit Please">
</form>
</body>
</html>