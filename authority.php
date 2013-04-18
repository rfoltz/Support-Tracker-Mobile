<?php
/*Source File: authority.php
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This does the security of the pages to see if someone if logged in as well a
					logging people out.
*/


session_start();

//if the user isn't logged in none of these session variables will be set.
if (!isset($_SESSION) || (!isset($_SESSION['UserID']) && !isset($_SESSION['Firstname']) && !isset($_SESSION['Lastname']))) {
  header("Location: login.php");
  exit;
}

//check to see if the timeout variable is set
if(isset($_SESSION['timeout'])) { // if it is then check to see if the user has been inactive for 10 minutes.
	if ($_SESSION['timeout'] + 10 * 60 < time()) {
		session_unset(); //unset all variables in the session
		session_destroy(); //destroy the session
		header("Location: login.php"); //redirect if the user hasn't been active for 10 minutes.
		exit;
	}
}

$_SESSION['timeout'] = time(); //set the last known activity time.

if(isset($_GET["logout"])) //if the user wants to log out.
{
	if($_GET["logout"] == true) //just incase someone puts ?logout=false
	{
		session_unset(); //unset all variables in the session
		session_destroy(); //destroy the session
		header("Location: login.php"); // and redirect them to the login page.
  		exit;
	}
}
?>