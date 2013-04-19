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
	
	if(isset($_GET['number'])) //Only connect to the database if a ticket is being queried.
	{
		//Query database for all tickets assigned to the current user.
		$stmt = $db->prepare('select *,LPAD(Num,7,"0") as ticket_num from tickets where num = ?');
		$stmt->bindValue(1, $_GET['number']);
		$stmt->execute();
	
		// Grab the ticket
		$ticket_info = $stmt->fetch();
	}
?>

<!DOCTYPE html> 
<html>
<head>
	<!--
	File name: update-ticket.php
	Author's name: Robert Foltz
	Web site name: www.robertfoltz.com/mobile
	File description: This is the jQuery Mobile Web App for the support tracker website. This page is used to update tickets.
	-->

	<title>Support Tracker - Update Ticket</title>
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
	<!-- Update Ticket Page -->
	<div data-role="page" data-theme="a" id="update-ticket-page">
		<!--Page header -->
		<header data-role="header">
            <h1>Update Ticket</h1>
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
        	<h1>Updating Ticket #: <?php echo($ticket_info['ticket_num']); ?></h1>
            <p class="alert">All Items with a * are required</p>
            <div class="error-message alert"></div>
            <form method="POST" enctype="multipart/form-data" id="update-form">
                
                <input name="ticket-num" id="ticket-num" type="hidden" value="<?php echo($ticket_info['Num']); ?>">
                
                <label for="technician">Technician:</label>
                <select name="technician" id="technician">
					<option value=""></option>
					<?php foreach ($techs as $tech) : ?>
						<?php if($tech['UserID'] == $ticket_info['Technician']) {?>
								<option selected value="<?php echo($tech['UserID']); ?>"><?php echo($tech['Firstname']." ".$tech['Lastname']); ?></option>
						<?php } else { ?>
								<option value="<?php echo($tech['UserID']); ?>"><?php echo($tech['Firstname']." ".$tech['Lastname']); ?></option>
						<?php }?>
					<?php endforeach; ?>
				</select><br>
				
				<label for="category"><span class="alert">*</span>Category:</label>
				<select name="category" id="category">
					<?php foreach ($categories as $category) : ?>
						<?php if($category['CatID'] == $ticket_info['Category']) {?>
							<option selected value="<?php echo($category['CatID']); ?>"><?php echo($category['Catname']); ?></option>
						<?php } else { ?>
							<option value="<?php echo($category['CatID']); ?>"><?php echo($category['Catname']); ?></option>
						<?php }?>
					<?php endforeach; ?>
				</select><br>
				
				<label for="created">Created:</label>
				<p><?php echo($ticket_info['Created']); ?></p><br>
				
				<label for="updated">Last Updated:</label>
				<p><?php echo($ticket_info['Updated']); ?></p><br>
                
                <label for="email"><span class="alert">*</span>Customer Email:</label>
				<input type="email" name="email" id="email" value="<?php echo($ticket_info['CEmail']); ?>"><br>
				
				<label for="name"><span class="alert">*</span>Customer Name:</label>
				<input type="text" name="name" id="name" value="<?php echo($ticket_info['CName']); ?>"><br>
				
				<label for="country"><span class="alert">*</span>Customer Country:</label>
				<input type="text" name="country" id="country" value="<?php echo($ticket_info['CCountry']); ?>"><br>
				
				<label for="issue"><span class="alert">*</span>Question/Issue:</label>
				<textarea name="issue" id="issue" class="textareas"><?php echo($ticket_info['Issue']); ?></textarea><br>
				
				<label>Log:</label><br>
				<textarea id="log" class="textareas"><?php echo($ticket_info['Log']); ?></textarea><br>
				
				<!--Holds button the user clicked. Also this defaults to update just incase the user hits enter.-->
				<input type="hidden" name="choice" id="choice" value="update">
				<input type="submit" name="update" id="update" value="Update">
				<input type="submit" name="delete" id="delete" value="Delete">
				<?php if($ticket_info['Completed'] == "N") { ?>
				<input type="submit" name="close" id="close" class="spaced" value="Close">
				<?php } else {?>
				<input type="submit" name="reopen" id="reopen" class="spaced" value="Reopen">
				<?php }?>
			</form>
        </section>
    
        <footer data-role="footer">
            <h4>Copyright of Robert Foltz 2013</h4>
        </footer><!-- /footer -->
	</div><!-- /page -->
	
	<!--Ticket Handler JS --> 
    <script src="js/ticketHandler.js"></script>
	
</body>
</html>