<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', '1');
// If user is logged in, header them away
if(isset($_SESSION["username"])){
	header("location: message.php?msg=You are already a member.");
    exit();
}
?><?php
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
	include_once("doDBi.php");
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	//May have to be "SELECT user_id or the original id
	$insertSQL = "SELECT username FROM users WHERE username='$username' LIMIT 1";
	$query = mysqli_query($doDB, $insertSQL); 
    $uname_check = mysqli_num_rows($query) or die($doDB->error);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}
?><?php
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	// CONNECT TO THE DATABASE
	include_once("doDBi.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$e = mysqli_real_escape_string($doDB, $_POST['e']);
	$p = $_POST['p'];
	$pd = $_POST ['pd'];
	$ln = $_POST ['ln'];
	$fn = $_POST ['fn'];
	$i = $_POST ['i'];
	$d = $_POST ['d'];
	$a = $_POST ['a'];
	$ps = $_POST ['ps'];
	$g = preg_replace('#[^a-z]#', '', $_POST['g']);
	$c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$insertSQL = "SELECT id FROM users WHERE username='$u' LIMIT 1";
    $query = mysqli_query($doDB, $insertSQL); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$insertSQL = "SELECT id FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($doDB, $insertSQL); 
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == "" || $g == "" || $c == "" || $a == "" || $d == "" || $ps == ""|| $pd == ""|| $i == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		$cryptpass = crypt($p);
		include_once ("php_includes/randStrGen.php");
		$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		// Add user info into the database table for the main site table
		$insertSQL = "INSERT INTO users (nameFirst, nameLast, storPrevious, disability, disorder, username, email, password, gender, country, ip, signup, illness, lastlogin, notescheck)       
		        VALUES('$fn','$ln','$ps','$i','$pd','$d','$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
		$query = mysqli_query($doDB, $insertSQL); 
		$uid = mysqli_insert_id($doDB);
		// Establish their row in the useroptions table
		$insertSQL = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
		$query = mysqli_query($doDB, $insertSQL);
		// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$u")) {
			mkdir("user/$u", 0755);
		}
		// Email the user their activation link
		$to = "$e";							 
		$from = "auto_responder@1inthesame.com";
		$subject = '1inTheSame Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>1inTheSame Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>1inTheSame Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script>
function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "email"){
		rx = /[' "]/gi;
	} else if(elem == "username"){
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
function emptyElement(x){
	_(x).innerHTML = "";
}
function checkusername(){
	var u = _("username").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
function signup(){
	var fn = _("nameFirst").value;
	var ln = _("nameLast").value;
	var a = _("age").value;
	var d = _("disorder").value;
	var pd = _("disability").value;
	var i = _("illness").value;
	var u = _("username").value;
	var e = _("email").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var c = _("country").value;
	var ps = _("previousStory").value;
	var g = _("gender").value;
	var status = _("status");
	if(u == "" || fn =="" || ln =="" || e == "" || p1 == "" || p2 == "" || c == "" || g == "" || a == "" || d == "" || pd == ""|| i == "" || ps == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else if( _("terms").style.display == "none"){
		status.innerHTML = "Please view the terms of use";
	} else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				}
	        }
        }
        ajax.send("&u="+u+"&ps="+ps+"&i="+i+"&pd="+pd+"&d="+d+"&a="+a+"&ln="+ln+"&fn="+fn+"&e="+e+"&p="+p1+"&c="+c+"&g="+g);
	}
}
function openTerms(){
	_("terms").style.display = "block";
	emptyElement("status");
}

/* function addEvents(){
	_("elemID").addEventListener("click", func, false);
}
window.onload = addEvents; */
</script>
</head>
<body>
<div id="pageMiddle">
  <h3>Sign Up Here</h3>
  <form name="signupform" id="signupform" onsubmit="return false;">
    <div>Username: </div>
    <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16">
    <span id="unamestatus"></span>
     <label for="nameFirst"><div> First Name:</div></label>
          <input type="text" name="nameFirst" id="nameFirst" />
          <label for="nameLast"><div>Last Name:</div></label>
          <input type="text" name="nameLast" id="nameLast" />
    <div>Email Address:</div>
    <input id="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88">
    <div>Create Password:</div>
    <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="16">
    <div>Confirm Password:</div>
    <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="16">
    <div>Gender:</div>
    <select id="gender" onfocus="emptyElement('status')">
      <option value=""></option>
      <option value="m">Male</option>
      <option value="f">Female</option>
    </select>
    <div>Country:</div>
   
      <select id="country" onfocus="emptyElement('status')">
        <?php include_once("template_country_list.php"); ?>
      </select>
   
      <label for="<?php $value ?>"><div>Age:</div>
       
      </label>
      <select id="age" name="age" onfocus="emptyElement('status')">
        <?php 
for($value = 1; $value <= 100; $value++){ 
    echo('<option value="' . $value . '">' . $value . '</option>');
}
?>
      </select>
      </p>
    </p>
     
          <br />
    </p>
       <div> <p align="left"> Now, please select the condition you have(Medical Contition, Disability, ect).<br />
        You may select multiple conditions. </p></div>
        <br />
          <label for="disorder"><div>Disorders:</div></label>
       
    <p align="left">
          <select name="disorder" multiple="multiple" onfocus="emptyElement('status')">
            <?php require("conditions/disorder.php"); ?>
          </select>
        </p>
        <p align="left">
          <label for="disability">Physical Disabilities:</label>
        </p>
        <p align="left">
          <select name="disability" multiple="multiple" onfocus="emptyElement('status')">
            <option>Amputation</option>
            <option>Burn</option>
            <option>Paraplegic</option>
          </select>
        </p>
        <div align="left"><br />
        </div>
        <p align="left">
          <label for="illness">Illness:<br />
          </label>
          <select name="illness" multiple="multiple" onfocus="emptyElement('status')">
            <option>Cancer</option>
            <option>HIV</option>
            <option>AIDS</option>
          </select>
        </p>
        <div align="left"><br />
        </div>
        <p align="left"> Now, what is your story? What is your condition and how do you feel about it? How did you first discover your condition?  Remember, 1inTheSame's Anonymous Members can only be viewed by the users they connect with, so be as honest as possible.</p>
        <p align="left">
          <textarea name="previousStory" rows="12" cols="60" id="previousStory" onfocus="emptyElement('status')" requiredplaceholder="Tell Your Story Here..." ></textarea>
        </p>
        <div align="left">
        </div>
        <p></p>
        <input type="hidden" name="MM_insert" value="form1" />
  </form>
    <div>
      <a href="#" onclick="return false" onmousedown="openTerms()">
        View the Terms Of Use
      </a>
    </div>
    <div id="terms" style="display:none;">
      <h3>Web Intersect Terms Of Use</h3>
      <p>1. 1inThe Same is a free site.</p>
      <p>2. Take a bath before you visit.</p>
      <p>3. Brush your teeth before bed.</p>
    </div>
    <br /><br />
    <button id="signupbtn" onclick="signup()">Create Account</button>
    <span id="status"></span>
  </form>
</div>

</body>
</html>
