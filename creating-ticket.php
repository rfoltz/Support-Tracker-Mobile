<?php
/* Source File: create-ticket.php
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page that actually creates a ticket in the database
*/

	require_once('authority.php');
	require_once('dbConnection.php');	
	// 
	$json_data = array();
	
	//Create the log statement.
	$log = 'Created at '.date("Y-m-d H:i:s").' By '.$_SESSION['Firstname']." ".$_SESSION['Lastname']."\n";
		
	//Create a prepared INSERT statement
	$stmt = $db->prepare('INSERT INTO tickets (Created, Updated, CEmail, CName, CCountry, Issue, Technician, Category, Log) VALUES (?,?,?,?,?,?,?,?,?)');
	$stmt->bindValue(1, date("Y-m-d H:i:s"));
	$stmt->bindValue(2, date("Y-m-d H:i:s"));
	$stmt->bindValue(3, $_POST['email']);
	$stmt->bindValue(4, $_POST['name']);
	$stmt->bindValue(5, $_POST['country']);
	$stmt->bindValue(6, $_POST['issue']);
	// if the technician is empty then use NULL else use the value of the dropdown.
	if($_POST['technician'] == "")
	{
		$stmt->bindValue(7, NULL);
	}else{
		$stmt->bindValue(7, $_POST['technician']);
	}
	$stmt->bindValue(8, $_POST['category']);
	$stmt->bindValue(9, $log);
	$sucessful = $stmt->execute();
	
	//check to see if the statement executed successfully.
	if($sucessful) {
		$json_data['success'] = true;
		$json_data['message'] = 'Ticket Created!';
	} else {
		$json_data['success'] = false;
		$json_data['message'] = 'Hmm Something went wrong...';
	}
	
	// Encode response as JSON
	echo (json_encode($json_data));
?>