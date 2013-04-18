<?php require_once('authority.php'); ?>
<?php require_once('dbConnection.php'); ?>

<?php	
	//Select all Categories.
	$stmt = $db->query('select * from category');
	
	// Grab the tickets
	$categories = $stmt->fetchAll();
	
	//Query database for all tickets assigned to the current user.
	$stmt = $db->query('select * from techs');
	
	// Grab the tickets
	$techs = $stmt->fetchAll();
?>

<!DOCTYPE html> 
<html>
<head>
	<!--
	File name: create-ticket.php
	Author's name: Robert Foltz
	Web site name: www.robertfoltz.com/mobile
	File description: This is the jQuery Mobile Web App for the support tracker mobile website which creates a ticket.
	-->

	<title>Support Tracker - Create Ticket</title>
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
	<!-- Create Ticket Page -->
	<div data-role="page" data-theme="a" id="create-ticket-page">
		<!--Page header -->
		<header data-role="header">
            <h1>Create Ticket</h1>
        </header><!-- /header -->
        <h1 style="text-align:center;">Support Tracker</h1>
		<!--Here's the nav bar it's just a gird with 2 buttons.-->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a href="create-ticket.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Create Ticket</a></div>
			<div class="ui-block-b"><a href="your-tickets.php" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Your Tickets</a></div>
		</div><!-- grid-a -->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a href="queue.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Ticket Queue</a></div>
			<div class="ui-block-b"><a href="authority.php?logout=true" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Logout</a></div>
		</div><!-- grid-a -->
    	
    	<!--Page content -->
        <section data-role="content">
        	<h1>Create a Ticket</h1>
            <p class="alert">All Items with a * are required</p>
            <div class="error-message alert"></div>
            <form method="POST" enctype="multipart/form-data" id="create-form">
				<label for="email"><span class="alert">*</span>Customer Email:</label>
				<input type="email" name="email" id="email" placeholder="name@mail.com"><br>
			
				<label for="name"><span class="alert">*</span>Customer Name:</label>
				<input type="text" name="name" id="name" placeholder="John Smith"><br>
			
				<label for="country"><span class="alert">*</span>Customer Country:</label>
				<input type="text" name="country" id="country" placeholder="Canada"><br>
			
				<label for="category"><span class="alert">*</span>Category:</label>
				<select name="category" id="category">
					<option value=""></option>
					<?php foreach ($categories as $category) : ?>
					<option value="<?php echo($category['CatID']); ?>"><?php echo($category['Catname']); ?></option>
					<?php endforeach; ?>
				</select><br>
			
				<label for="issue"><span class="alert">*</span>Question/Issue:</label>
				<textarea name="issue" id="issue" class="textareas"></textarea><br>
			
				<label for="technician"> Assign a Technician:</label>
				<select name="technician" id="technician">
					<option value=""></option>
					<?php foreach ($techs as $tech) : ?>
					<option value="<?php echo($tech['UserID']); ?>"><?php echo($tech['Firstname']." ".$tech['Lastname']); ?></option>
					<?php endforeach; ?>
				</select><br>
			
				<input class="spaced" id="submit" type="submit" value="Submit Ticket"><br>
			</form>
        </section>
    
        <footer data-role="footer">
            <h4>Copyright of Robert Foltz 2013</h4>
        </footer><!-- /footer -->
	</div><!-- /page -->
	
	<!--Create Ticket Handler JS --> 
    <script src="js/create-ticket.js"></script>
	
</body>
</html>