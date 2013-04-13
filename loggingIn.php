<?php
	/* Source File: loggingIn.php
	Name:Robert Foltz
	Last Modified By: Robert Foltz
	Website Name: Support Tracker
	File Description: This is the page that logs the user into the website.
	*/

	require_once('dbConnection.php');	
	// 
	$json_data = array();
	
	//encrypt password
	$salt = "foo";
	$pepper = "bar";
	$salt = sha1($salt);
	$pepper = sha1($pepper);
	$string = $salt . $_POST['password'] . $pepper;
	$password = sha1($string);

		
	//Query database to check if user information is valid.
	$stmt = $db->prepare('select * from techs where username = ? and password = ?');
	$stmt->bindValue(1, $_POST['username']);
	$stmt->bindValue(2, $password);
	$stmt->execute();
	
	// Check if user provided correct username and password
	$user_info = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$user_info) {
		$json_data['success'] = false;
		$json_data['message'] = 'Invalid username or password.';
	} else {
		$json_data['success'] = true;
		session_start();
		$_SESSION['UserID'] = $user_info['UserID'];
		$_SESSION['Firstname'] = $user_info['Firstname'];
		$_SESSION['Lastname'] = $user_info['Lastname'];
	}
	
	// Encode response as JSON
	echo (json_encode($json_data));
?>