<?php
//Check for Errors
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
// If user is logged in, header them away
if(isset($_SESSION["username"])){
	header("location: message.php?msg=You are already a member.");
    exit();
}
//Access Database
 require_once('doDB.php');
 
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
  $insertSQL = sprintf("INSERT INTO users (nameFirst, nameLast, username, password, passwordRetype, EMAIL, age, gender, disorder, disability, illness, storyPrevious) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nameFirst'], "text"),
                       GetSQLValueString($_POST['nameLast'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['passwordRetype'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['age'], "int"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['disorder'], "text"),
                       GetSQLValueString($_POST['disability'], "text"),
                       GetSQLValueString($_POST['illness'], "text"),
                       GetSQLValueString($_POST['previousStory'], "text"));

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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member Sign up</title>

</head>


<body>
<div align="center">
<img src="logo_with_banner/HomePage_longer_final_sign_up.gif" width="1331" height="142" usemap="#Map" border="0" />
<map name="Map" id="Map">
  <area shape="circle" coords="107,71,75" href="PhotoShop_1intheSame/HomePage_longer_final_new.html" />
</map>
<table width="1196" height="1102" border="0">
  <tr>
      <th width="658" scope="col"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <label for="accountType">
          <div align="left">First, select your reason for visiting 1inTheSame.com</div>
        </label>
        <div align="left">
          <select name="accountType" size="1" id="accountType" onchange="location = this.options[this.selectedIndex].value;">
            <option selected="selected" value="help_needed_signup.php">To Seek Help</option>
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
        </p>
        <p align="left"><br />
          <label for="gender"> Gender:</label>
          <br />
          <label>
            <input type="radio" name="gender" value="male" id="gender_0" />
            Male</label>
          <br />
          <label>
            <input type="radio" name="gender" value="female" id="gender_1" />
            Female</label>
          <br />
        </p>
        <p align="left"> Now, please select the problems you have(Medical Contition, Disability, ect).<br />
        You may select multiple problems. </p>
        <p align="left"><br />
          <label for="disorder">Disorders:</label>
        </p>
        <p align="left">
          <select name="disorder" multiple="multiple">
            <option>ADHD(attention deficit hyperactivity disorder)</option>
            <option>ADD</option>
            <option>Bi Polar</option>
            <option>DID(Dissociative identity Disorder)</option>
            <option>Adult antisocial behavior</option>
            <option>Alcohol abuse</option>
            <option>Alcohol withdrawal</option>
            <option>Anxiety disorder</option>
            <option>Autism</option>
            <option>Barbiturate dependence</option>
            <option>Benzodiazepine dependence</option>
            <option>Benzodiazepine misuse</option>
            <option>Benzodiazepine withdrawal</option>
            <option>Bereavement</option>
            <option>Bibliomania</option>
            <option>Binge eating disorder</option>
            <option>Bipolar disorder</option>
            <option>Bipolar I disorder</option>
            <option>Bipolar II disorder</option>
            <option>Body dysmorphic disorder</option>
            <option>Borderline intellectual functioning</option>
            <option>Borderline personality disorder</option>
            <option>Brief psychotic disorder</option>
            <option>Bulimia nervosa</option>
            <option>Caffeine-related disorder</option>
            <option>Caffeine-induced sleep disorder</option>
            <option>Cannabis dependence</option>
            <option>Claustrophobia</option>
            <option>Catatonic disorder</option>
            <option>Catatonic schizophrenia</option>
            <option>Childhood amnesia</option>
            <option>Childhood antisocial behavior</option>
            <option>Circadian rhythm sleep disorder</option>
            <option>Cocaine dependence</option>
            <option>Cocaine intoxication</option>
            <option>Cognitive disorder</option>
            <option>Communication disorder</option>
            <option>Conduct disorder</option>
            <option>Cotard delusion</option>
            <option>Cyclothymia</option>
            <option>Delirium tremens</option>
            <option>Depersonalization disorder</option>
            <option>Depressive disorder</option>
            <option>Derealization disorder</option>
            <option>Dermatillomania</option>
            <option>Desynchronosis</option>
            <option>Developmental coordination disorder</option>
            <option>Diogenes Syndrome</option>
            <option>Dispareunia</option>
            <option>Dissociative identity disorder (multiple personality disorder) </option>
            <option>Dyslexia</option>
            <option>Dysthymia</option>
            <option>EDNOS</option>
            <option>Ekbom's Syndrome (Delusional Parasitosis)</option>
            <option>Encopresis</option>
            <option>Enuresis (not due to a general medical condition)</option>
            <option>Erotomania</option>
            <option>Exhibitionism</option>
            <option>Factitious disorder</option>
            <option>Fregoli delusion</option>
            <option>Frotteurism</option>
            <option>Fugue State</option>
            <option>Ganser syndrome (due to a mental disorder)</option>
            <option>Gender identity disorder</option>
            <option>Generalized anxiety disorder</option>
            <option>General adaptation syndrome</option>
            <option>Grandiose delusions</option>
            <option>Hallucinogen-related disorder</option>
            <option>Hallucinogen persisting perception disorder</option>
            <option>Histrionic personality disorder</option>
            <option>Huntington's disease</option>
            <option>Hypomanic episode</option>
            <option>Hypochondriasis</option>
            <option>Impulse control disorder</option>
            <option>Impulse-control disorder not elsewhere classified</option>
            <option>Inhalant abuse</option>
            <option>Insomnia due to a general medical condition</option>
            <option>Intellectual disability</option>
            <option>Intermittent explosive disorder</option>
            <option>Kleptomania</option>
            <option>Korsakoff's syndrome</option>
            <option>Lacunar amnesia</option>
            <option>Major depressive disorder</option>
            <option>Major depressive episode</option>
            <option>Male erectile disorder</option>
            <option>Malingering</option>
            <option>Manic episode</option>
            <option>Mathematics disorder</option>
            <option>Medication-related disorder</option>
            <option>Melancholia</option>
            <option>Minor depressive disorder</option>
            <option>Minor depressive episode</option>
            <option>Misophonia</option>
            <option>Mixed episode</option>
            <option>Mood disorder</option>
            <option>Mood episode</option>
            <option>Morbid jealousy</option>
            <option>Munchausen's syndrome</option>
            <option>Munchausen's syndrome by proxy</option>
            <option>Narcissistic personality disorder</option>
            <option>Neglect of child</option>
            <option>Neuroleptic-related disorder</option>
            <option>Nicotine withdrawal</option>
            <option>Night eating syndrome</option>
            <option>Nightmare disorder </option>
            <option>Obsessive-compulsive disorder (OCD)</option>
            <option>Obsessive-compulsive personality disorder (OCPD)</option>
            <option>Oneirophrenia</option>
            <option>Opioid dependence</option>
            <option>Opioid-related disorder</option>
            <option>Oppositional defiant disorder (ODD)</option>
            <option>Orthorexia (ON)</option>
            <option>Pain disorder</option>
            <option>Panic disorder</option>
            <option>Paranoid personality disorder</option>
            <option>Parasomnia</option>
            <option>Parkinson's Disease</option>
            <option>Partner relational problem</option>
            <option>Pathological gambling</option>
            <option>Perfectionism</option>
            <option>Persecutory delusion</option>
            <option>Personality change due to a general medical condition</option>
            <option>Personality disorder</option>
            <option>Phencyclidine (or phencyclidine-like)-related disorder</option>
            <option>Phobic disorder</option>
            <option>Phonological disorder</option>
            <option>Physical abuse</option>
            <option>Pica</option>
            <option>Polysubstance-related disorder</option>
            <option>Post-traumatic embitterment disorder (PTED)</option>
            <option>Posttraumatic stress disorder (PTSD)</option>
            <option>Premature ejaculation</option>
            <option>Primary hypersomnia</option>
            <option>Primary insomnia</option>
            <option>Psychogenic amnesia</option>
            <option>Psychological factor affecting medical condition</option>
            <option>Psychotic disorder</option>
            <option>Pyromania</option>
            <option>Reactive attachment disorder of infancy or early </option>
            <option>childhood</option>
            <option>Reading disorder</option>
            <option>Recurrent brief depression</option>
            <option>Relational disorder</option>
            <option>Residual schizophrenia</option>
            <option>Retrograde amnesia</option>
            <option>Rumination syndrome</option>
            <option>Sadomasochism</option>
            <option>Schizoaffective disorder</option>
            <option>Schizoid personality disorder</option>
            <option>Schizophrenia</option>
            <option>Schizophreniform disorder</option>
            <option>Schizotypal personality disorder</option>
            <option>Seasonal affective disorder</option>
            <option>Sedative-, hypnotic-, or anxiolytic-related disorder</option>
            <option>Selective mutism</option>
            <option>Separation anxiety disorder</option>
            <option>Severe mental retardation</option>
            <option>Shared psychotic disorder</option>
            <option>Sleep disorder</option>
            <option>Sleep paralysis</option>
            <option>Sleep terror disorder</option>
            <option>Sleepwalking disorder</option>
            <option>Social anxiety disorder</option>
            <option>Social phobia</option>
            <option>Somatization disorder</option>
            <option>Somatoform disorder</option>
            <option>Specific phobia</option>
            <option>Stendhal syndrome</option>
            <option>Stereotypic movement disorder</option>
            <option>Stuttering</option>
            <option>Substance-related disorder</option>
            <option>Tardive dyskinesia</option>
            <option>Tourette syndrome</option>
            <option>Transient global amnesia</option>
            <option>Trichotillomania</option>
          </select>
        </p>
        <p align="left">
          <label for="disability">Physical Disabilities:</label>
        </p>
        <p align="left">
          <select name="disability" multiple="multiple">
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
          <select name="illness" multiple="multiple">
            <option>Cancer</option>
            <option>HIV</option>
            <option>AIDS</option>
          </select>
        </p>
        <div align="left"><br />
        </div>
        <p align="left"> Now, what is your story? What is your situation and how do you feel about it? How did you first discover your situation?  Remember, 1inTheSame.com Anonymous Member can only be viewed by the users they connect with so be as honest as possible.</p>
        <p align="left">
          <textarea name="previousStory" rows="12" cols="60" id="previousStory" required="required"placeholder="Tell Your Story Here..." ></textarea>
        </p>
        <div align="left">
          <input name="submit" type="submit" value="Create Account" />
        </div>
        <p></p>
        <input type="hidden" name="MM_insert" value="form1" />
      </form></th>
      <th width="522" scope="col"><table width="200" height="648" border="1">
        <tr>
          <th height="212" scope="col">The purpose of being an Anonymous Member is to help you find answers and that success in accepting yourself so you can help many others just like you in the world.
  As an Anonymous Member, you will be hidden from every user on 1inTheSame. </th>
        </tr>
        <tr>
          <th scope="row">The only way a public member can view your story is if you connect with that user for guidance.
  1inTheSame.com values our Anonymous Members.We give you the option to recieve motivational statuses and much more from the Published Users' stories you relate to.</th>
        </tr>
        <tr>
          <th scope="row">Even if you do not find a Published Member that has been through your situation, you may be the first one on 1inTheSame to have your problem. Don't give up because there are people that are going through your same situation coming to the site for answers and ways of acceptance. </th>
        </tr>
      </table></th>
  </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>


<?php
mysql_free_result($Recordset1);

?>


</html>

