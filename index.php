<!DOCTYPE html> 
<html>
<head>
	<!--
	File name: index.php
	Author's name: Robert Foltz
	Web site name: www.robertfoltz.com/mobile
	File description: This is the jQuery Mobile Web App for the support tracker website.
	-->

	<title>Support Tracker - Home</title>
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
	<!-- Home Page -->
	<div data-role="page" data-theme="a" id="home-page">
		<!--Page header -->
		<header data-role="header">
            <h1>Home</h1>
        </header><!-- /header -->
        <h1 style="text-align:center;">Support Tracker</h1>
		<!--Here's the nav bar it's just a gird with 2 buttons.-->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a class="ui-btn-active" href="index.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Home</a></div>
			<div class="ui-block-b"><a href="login.php" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Login</a></div>
		</div><!-- grid-a -->
    	
    	<!--Page content -->
        <section data-role="content">
			<h1>Welcome to Support Tracker</h1>
			<p>Support Tracker is a support ticket system packed into a website which is responsive so you're employees can view and update tickets on a variety of devices. There is also a mobile web app in the works as well which will allow your employees to view tickets effectively and efficiently on mobile devices.</p>
			<p>If you would like to try the demo please just login with with:</p>
			<p><label>Username: demo</label></p>
			<p><label>Password: 123456</label></p>
		
			<h3>Contact The Creator!</h3>
			<a href="//plus.google.com/109073700143949670409?prsrc=3" rel="publisher" style="text-decoration:none;">
			<img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/></a>
			<a href="//ca.linkedin.com/pub/robert-foltz/63/b61/593" rel="" style="text-decoration:none;">
			<img src="imgs/linkedin_32.png" alt="LinkedIn" style="border:0;width:32px;height:32px;"/></a>
			<p>Feel free to click on any of the following social networks and chat with me I'm always up for talking to new people.</p>
			<p>or email me at: <a class="link-colour" href="mailto:me@robertfoltz.com">me@robertfoltz.com</a></p>
        </section>
    
        <footer data-role="footer">
            <h4>Copyright of Robert Foltz 2013</h4>
        </footer><!-- /footer -->
	</div><!-- /page -->
	
	<!-- Load my JS and Plugins at the bottom for site speed -->
	
</body>
</html>