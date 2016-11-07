<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Published Member Sign up</title>
<img src="logo_with_banner/HomePage_longer_final_sign_up.gif" width="1331" height="142" usemap="#Map" border="0" />
<map name="Map" id="Map">
  <area shape="circle" coords="107,71,75" href="PhotoShop_1intheSame/HomePage_longer_final_new.html" />
</map>
</head>

<body>
<table width="1334" height="601">
  <tr>
    <th width="26" height="98" scope="col">&nbsp;</th>
    <th width="587" scope="col"><form id="form2" name="form2" method="post" action="">
      <label for="joinReason">First, select your reason for visiting 1inTheSame.com</label>
       <select name="joinReason" size="1" id="joinReason" onchange="location = this.options[this.selectedIndex].value;">
 <option selected="selected" value="giving_help.php">To Help Someone</option>
 <option value="support_signup.php"> To Support</option>
 <option value="help_needed_signup.php">To Seek Help</option>
</select>
      </select>
    </form></th>
    <th width="46" scope="col">&nbsp;</th>
    <th width="536" scope="col">&nbsp;</th>
    <th width="102" scope="col">&nbsp;</th>
    <th width="9" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="331" scope="row">&nbsp;</th>
    <td><form id="user_registration" name="user_registration" method="post" action="user_info.php">
      <p>
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
       <label for="<?php $age ?>">Age:</label>
        <select name="age">
        
     <?php 
for($age = 1; $age <= 100; $age++){ 
    echo('<option value="' . $age . '">' . $age . '</option>');
}
?>

</select>

        <br />
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
      <p>
      Now, please select the problems you have(Medical Contition, Disability, ect).<br /> You may select multiple problems.
      <br />
      <label for="disorder">Disorders:</label>
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
<option>Nightmare disorder
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
<option>Reactive attachment disorder of infancy or early childhood </option>
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
      <p>
        <label for="disability">Physical Disabilities:</label>
        <select name="disability" multiple="multiple">
          <option>Amputation</option>
          <option>Burn</option>
          <option>Paraplegic</option>
        </select>
      </p>
      <br />
      <p>
      <label for="illness">Illnesses:</label>
        <select name="illness" multiple="multiple">
          <option>Cancer</option>
          <option>HIV</option>
          <option>AIDS</option>
          </select>
      </p>        
        
         <br />
        <p>
         Tell us about your previous story, before you found a success in accepting yourself. Tell us about the pain, suffering, and your thoughts while  you were going through your situation. Member's that read your previous story have a better chance of relating to you if your situations are similar.</p>
        <p>
          <textarea rows="12" cols="60" id="storyPrevious" name="storyPrevious" required="required"placeholder="Tell Your Previous Story Here..." ></textarea>
      </p>
         <p>
         Now, explain how you made it through your hardship, how you found that way of accepting yourself. Explain what helped you and how you feel now that you have found that success. Give hope for those who are going through what you did!</p>
         <p>
  <textarea rows="12" cols="60" id="storyCurrent" name="storyCurrent" required="required"placeholder="Tell Your Success Story Here..." ></textarea>
         </p>
         
         <input name="submit" type="submit" value="Create Account" />
       
    </form>
    
    
    
    
    </td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td><table width="242" height="508" border="1">
      <tr>
        <th width="232" scope="col">The Purpose of becoming a Published Member is not only to show the world you have accepted your self, but also help those who are in the same situation you were with your problem.</th>
      </tr>
      <tr>
        <th scope="row">Even if you're not wanting to be an active Published Member, your story can impact someone's life, regardless. We welcome all, even if you do not want to be an active user.</th>
      </tr>
      <tr>
        <th scope="row">After sign up, you'll be able to write motivational statuses that will be generated and posted to help those who are connected with you.</th>
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
</body>
</html>