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