/* Source File: ticketHandler.js
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page does the AJAXing to the update ticket handler.
*/

$(document).ready(function() {
	/** Login Form Submission
	 *		Handles form validation and AJAXing to server.
	 */
	 
	/*since the way the submit works with jQuery and doing it programatically
	 it doesn't include what button was pressed we need a hidden input to record what
	 button was pressed. I just hope that the jQuery is fast enough to change the value of
	 the hidden input before the form is submitted to the server. 
	*/
	$('input[type="submit"]').click(function() {
		$('#choice').val(this.name) // give the value of the button clicked to this hidden input.
	});
	$("#update-form").submit(function (e) {
		e.preventDefault();
		//Check to ensure category is filled.
		if ($("#category").val().length == 0) {
			$(".error-message").text("Please enter a category.");
			$("#category").focus();
			return false;
		}
		
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
		
		//Check to ensure issue is filled.
		if ($("#issue").val().length == 0) {
			$(".error-message").text("Please enter the issue or question.");
			$("#issue").focus();
			return false;
		}
	
		// AJAX server to do things with the ticket
		$.ajax({  
		  type: "POST",
		  url: "ticketHandler.php",  
		  data: $("#update-form").serialize(),
		  success: function(data) {
				var result = JSON.parse(data);
				if (result.success) {
					alert(result.message);
				} else {
					alert(result.message);
				}
		  }
		});  
	});
});
