<?php
session_start();

//if the user is already logged in just redirect them to the your tickets page.
if(isset($_SESSION['UserID']) && isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])) 
{
  header("Location: your-tickets.php");
  exit;
}
?>

<!DOCTYPE html> 
<html>
<head>
	<!--
	File name: login.php
	Author's name: Robert Foltz
	Web site name: www.robertfoltz.com/mobile
	File description: This is the jQuery Mobile Web App for the support tracker website.
	-->

	<title>Support Tracker - Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Mobile CSS -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
	<link rel="stylesheet" href="css/local.css" />
	<!-- Javascripts -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="js/override.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
</head>

<body>
	<!--Login Page -->
	<div data-role="page" data-theme="a" id="login-page">
		<!--Page header -->
		<header data-role="header">
            <h1>Login</h1>
        </header><!-- /header -->
        <h1 style="text-align:center;">Support Tracker</h1>
		<!--Here's the nav bar it's just a gird with 2 buttons.-->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a href="index.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Home</a></div>
			<div class="ui-block-b"><a class="ui-btn-active" href="login.php" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Login</a></div>
		</div><!-- grid-a -->
    	
    	<!--Page content -->
        <section data-role="content">
        	<h1>Support Tracker Login</h1>
            <div class="error-message alert"></div>
			<form data-ajax ="false" method="POST" enctype="multipart/form-data" id="login-form">
				<label for"username">Username:</label>
				<input type="text" name="username" id="username">
				<label for"password">Password:</label>
				<input type="password" name="password" id="password">
				<input id="submit" type="submit" value="Login">
			</form>
        </section>
    
        <footer data-role="footer">
            <h4>Copyright of Robert Foltz 2013</h4>
        </footer><!-- /footer -->
	</div><!-- /page -->
	
	<!-- Load my JS and Plugins at the bottom for site speed -->
	<script src="js/login-page.js"></script>
</body>
</html>