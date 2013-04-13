/* Source File: yourHandler.js
Name:Robert Foltz
Last Modified By: Robert Foltz
Website Name: Support Tracker
File Description: This is the page does the AJAXing to the yourHandler.php to delete and complete tickets from your list of tickets.
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
	$("#your-form").submit(function (e) {
		e.preventDefault();
		// AJAX server to do things with the ticket
		$.ajax({  
		  type: "POST",
		  url: "yourHandler.php",  
		  data: $("#your-form").serialize(),
		  success: function(data) {
				var result = JSON.parse(data);
				if (result.success) {
					alert(result.message);
				} else {
					console.log(result.message);
				}
		  }
		});  
	});
});
