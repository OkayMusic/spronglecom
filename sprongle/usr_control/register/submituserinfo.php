<?php
include "/../sprongleserv/sql_logins/usr_add.php";
session_start();

// Requests data sent through the form input to save as local variables
$emailin = htmlspecialchars($_POST['emailinput']);
$passin = htmlspecialchars($_POST['passinput']);
$passconf = htmlspecialchars($_POST['passconfirm']);

/* Now must pass a certain set of checks to confirm whether registration is
possible, such as:
Checking email isn't already registered
Checking Password conforms to certain criteria
Checking email address valid */

$errors="";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

// Checks existance of email input and checks validity of email
if (!isset($_POST['emailinput']))
{
  $errors .= 'You must enter an email address to register.<br>';
}
elseif (!preg_match($email_exp,$emailin)) {
  $errors .= 'Invalid email address.<br>';
}

// Checks equivalence of two password entries
if ($passin !== $passconf) {
  $errors .= 'Passwords do not match.<br>';
}
else {
// Checks password contains a set of characters
$containsULetter  = preg_match('/[A-Z]/', $passin);
$containsLLetter = preg_match('/[a-z]/', $passin);
$containsDigit   = preg_match('/\d/', $passin);

if (!($containsULetter and $containsLLetter))
{
  $errors .= 'Password must contain at least one upper-case and lower-case character.<br>';
}

if ($containsDigit == 0)
{
  $errors .= 'Password must contain at least one digit.<br>';
}

if (strlen($passin) < 6)
{
  $errors .= 'Password must be at least 6 characters long.<br>';
}

// Redirects user back to same page with error message if errors found
}
if (strlen($errors) > 0)
{
  $_SESSION['error_message'] = $errors;
  header( 'Location: /usr_control/register' );
}
// Checks if entry is already in database and returns errors if this is the case
$usrpresent = query_usr_exist($emailin);
if ($usrpresent)
{
  $_SESSION['error_message'] .= 'This email is already registered.';
  header( 'Location: /usr_control/register' );
}
else
{
/* Generates a hashkey which will be used to verify a user's email using
$_GET, and adds the key to the database */

$hashkey = md5(rand(0,1000));
add_usr($emailin,$passin,$hashkey);

/* Generates an email to verify authenticity by crosschecking hashkey
associated with sql entry */

$subject = 'Spronglecom: Account Verification';
$message = '

Welcome to Sprongle.com. Please click the link below to verify your email address:
http://sprongle.com/verify.php?email='.$emailin.'&hash='.$hash.'

';
$headers= 'From:noreply@sprongle.com'  .  "/r/n";
mail($emailin,$subject,$message,$headers);
}

header( 'Location: /usr_control/register/success');
?>
