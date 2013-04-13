<?php
/* Source File: ticketHandler.php
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page that handles the form when updating a ticket. You can either update/delete or compelete a ticket.
					This page also handles all the database associated with those changes. 
*/

	require_once('authority.php');
	require_once('dbConnection.php');	
	// 
	$json_data = array();
	
	
	if(isset($_POST['choice']) && $_POST['choice'] == "update") { // get the button choice
		//Create a prepared statement to UPDATE a ticket 
		$stmt = $db->prepare('UPDATE tickets SET Updated=?, CEmail=?, CName=?, CCountry=?, Issue=?, Technician=?, Category=? WHERE Num = ?');
		$stmt->bindValue(1, date("Y-m-d H:i:s"));
		$stmt->bindValue(2, $_POST['email']);
		$stmt->bindValue(3, $_POST['name']);
		$stmt->bindValue(4, $_POST['country']);
		$stmt->bindValue(5, $_POST['issue']);
		// if the technician is empty then use NULL else use the value of the dropdown.
		if($_POST['technician'] == "")
		{
			$stmt->bindValue(6, NULL);
		}else{
			$stmt->bindValue(6, $_POST['technician']);
		}
		$stmt->bindValue(7, $_POST['category']);
		$stmt->bindValue(8, $_POST['ticket-num']);
	
		$sucessful = $stmt->execute(); // execute statement
		
		//check to see if the statement executed successfully.
		if($sucessful) {
			$json_data['success'] = true;
			$json_data['message'] = 'Ticket was Updated!';
		} else {
			$json_data['success'] = false;
			$json_data['message'] = 'Hmm Something went wrong...';
		}
	} else if(isset($_POST['choice']) && $_POST['choice'] == "delete") {
		//Creat a prepared for statement to delete a Ticket.
		$stmt = $db->prepare('DELETE FROM tickets WHERE Num = ?');
		$stmt->bindValue(1, $_POST['ticket-num']);
		
		$sucessful = $stmt->execute();
		
		//check to see if the statement executed successfully.
		if($sucessful) {
			$json_data['success'] = true;
			$json_data['message'] = 'Ticket was Deleted!';
		} else {
			$json_data['success'] = false;
			$json_data['message'] = 'Hmm Something went wrong...';
		}
	} else if(isset($_POST['choice']) && $_POST['choice'] == "complete") {
		//Create a prepared statement to UPDATE a ticket 
		$stmt = $db->prepare('UPDATE tickets SET Updated=?, CEmail=?, CName=?, CCountry=?, Issue=?, Technician=?, Category=?, Completed = "Y" WHERE Num = ?');
		$stmt->bindValue(1, date("Y-m-d H:i:s"));
		$stmt->bindValue(2, $_POST['email']);
		$stmt->bindValue(3, $_POST['name']);
		$stmt->bindValue(4, $_POST['country']);
		$stmt->bindValue(5, $_POST['issue']);
		// if the technician is empty then use NULL else use the value of the dropdown.
		if($_POST['technician'] == "")
		{
			$stmt->bindValue(6, NULL);
		}else{
			$stmt->bindValue(6, $_POST['technician']);
		}
		$stmt->bindValue(7, $_POST['category']);
		$stmt->bindValue(8, $_POST['ticket-num']);
	
		$sucessful = $stmt->execute();
		
		//check to see if the statement executed successfully.
		if($sucessful) {
			$json_data['success'] = true;
			$json_data['message'] = 'Ticket was marked Completed!';
		} else {
			$json_data['success'] = false;
			$json_data['message'] = 'Hmm Something went wrong...';
		}
	} else { //just in case the hidden choice input doesn't have a choice display this.
		$json_data['success'] = false;
		$json_data['message'] = 'Hmm Something went wrong...';
	}
	
	// Encode response as JSON
	echo (json_encode($json_data));
?>