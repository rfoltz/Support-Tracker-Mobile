/* Source File: create-ticket.js
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page does the AJAXing and validation to the creating-ticket.php which will create a ticket in the database.
*/

$(document).ready(function() {
	/** Login Form Submission
	 *		Handles form validation and AJAXing to server.
	 */
	$("#create-form").submit(function (e) {
		e.preventDefault();
		//Check to ensure email is filled.
		if ($("#email").val().length == 0) {
			$(".error-message").text("Please enter a customer email.");
			$("#email").focus();
			return false;
		}
		
		//Check to ensure name is filled.
		if ($("#name").val().length == 0) {
			$(".error-message").text("Please enter a customer name.");
			$("#name").focus();
			return false;
		}
	
		//Check to ensure country is filled.
		if ($("#country").val().length == 0) {
			$(".error-message").text("Please enter a customers country.");
			$("#country").focus();
			return false;
		}
		
		//Check to ensure category is filled.
		if ($("#category").val().length == 0) {
			$(".error-message").text("Please enter a category.");
			$("#category").focus();
			return false;
		}
		
		//Check to ensure issue is filled.
		if ($("#issue").val().length == 0) {
			$(".error-message").text("Please enter the issue or question.");
			$("#issue").focus();
			return false;
		}
	
		// AJAX server to validate login information.
		$.ajax({  
		  type: "POST",
		  url: "creating-ticket.php",  
		  data: $("#create-form").serialize(),
		  success: function(data) {
				var login = JSON.parse(data);
				if (login.success) {
					//Reset inputs to original value.
					$('.error-message').empty();
					$('input:text').val('');
					$('textarea').val('');
					$('#category').prop('selectedIndex',0);
					$('#technician').prop('selectedIndex',0);
					alert(login.message); //Show the ticket was created!
				} else {
					alert(login.message);
				}
		  }
		});  
		return false;		
	});
});