<?php require_once('authority.php'); ?>
<?php require_once('dbConnection.php'); ?>

<?php	
	//Query database for all tickets assigned to the current user.
	$stmt = $db->prepare('select *,LPAD(Num,7,"0") as ticket_num from tickets where technician is NULL and completed <> "Y" ');
	$stmt->execute();
	
	// Grab the tickets
	$ticket_info = $stmt->fetchAll();
?>

<!DOCTYPE html> 
<html>
<head>
	<!--
	File name: queue.php
	Author's name: Robert Foltz
	Web site name: www.robertfoltz.com/mobile
	File description: This is the jQuery Mobile Web App for the support tracker website. This page displays the tickets in the queue
	-->

	<title>Support Tracker - Ticket Queue</title>
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
	<!-- Ticket Queue Page -->
	<div data-role="page" data-theme="a" id="ticket-queue-page">
		<!--Page header -->
		<header data-role="header">
            <h1>Ticket Queue</h1>
        </header><!-- /header -->
        <h1 style="text-align:center;">Support Tracker</h1>
		<!--Here's the nav bar it's just a gird with 2 buttons.-->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a href="create-ticket.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Create Ticket</a></div>
			<div class="ui-block-b"><a href="your-tickets.php" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Your Tickets</a></div>
		</div><!-- grid-a -->
		<div class="ui-grid-a">
			<div class="ui-block-a"><a class="ui-btn-active" href="queue.php" data-role="button" data-mini="true" data-icon="home" data-iconpos="top" data-corners="false" data-theme="a">Ticket Queue</a></div>
			<div class="ui-block-b"><a href="authority.php?logout=true" data-role="button" data-mini="true" data-icon="edit" data-iconpos="top" data-corners="false" data-theme="a">Logout</a></div>
		</div><!-- grid-a -->
    	
    	<!--Page content -->
        <section data-role="content">
        	<h1>Tickets in Queue</h1>
            <ul data-role="listview" data-filter="true" data-filter-placeholder="Search Ticket #..." data-inset="true">
				<?php foreach ($ticket_info as $ticket) : ?>
				<li><a href="update-ticket.php?number=<?php echo($ticket['Num']); ?>">Ticket #<?php echo($ticket['ticket_num']); ?></a></li>		
				<?php endforeach; ?>
			</ul>
        </section>
    
        <footer data-role="footer">
            <h4>Copyright of Robert Foltz 2013</h4>
        </footer><!-- /footer -->
	</div><!-- /page -->
</body>
</html>