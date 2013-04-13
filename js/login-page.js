/* Source File: login-page.js
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page does the AJAXing to the login script as well as validation to make sure they've at least put something in the boxes.
*/

$(document).ready(function() {
	/** Login Form Submission
	 *		Handles form validation and AJAXing to server.
	 */
	$("#login-form").submit(function (e) {
		e.preventDefault();
		//Check to ensure username is filled.
		if ($("#username").val().length == 0) {
			$(".error-message").text("Please enter a username.");
			$("#username").focus();
			return false;
		}
	
		//Check to ensure password is filled.
		if ($("#password").val().length == 0) {
			$(".error-message").text("Please enter a password.");
			$("#password").focus();
			return false;
		}
	
		// AJAX server to validate login information.
		$.ajax({  
		  type: "POST",
		  url: "loggingIn.php",  
		  data: $("#login-form").serialize(),
		  success: function(data) {
				var login = JSON.parse(data);
				if (login.success) {
					window.location = "your-tickets.php";
				} else {
					$(".error-message").text(login.message);
				}
		  }
		});  
		return false;		
	});
});