$(document).ready(function() { // There's a nice shorthand $(function() {})

	//setTimeout function to hide the messages
    function hide_messages(DOM_element) {
        var DOM_element = DOM_element;
        setTimeout(function() {
            $(DOM_element).fadeOut('slow'); // Fade out slow probably takes an argument about how slow. You don't need your own timeout.
        }, 3000);
    }

	$('#create-admin-form').submit(function (event) {
		event.preventDefault();
		var action = 'create';
		var admin_name = $('#admin_name').val();
        var is_admin = $('#is_admin').is(':checked') ? 'yes' : 'no';

        var ajaxCall = $.ajax({ 
        	url: 'create.php',
        	type: 'POST',
        	data: { action:action, admin_name: admin_name, is_admin: is_admin }
        });

	// You also need error handler
        ajaxCall.done(function(data) {
        	if(data === 'new user') {
        		$('#messages').show(); // That's way too much work to be done to show one message.
	            $('#messages').removeClass();
	            $('#messages').addClass('alert alert-success');
	            $('#messages').html('Record Created.');
                //reset the form
                $('#create-admin-form')[0].reset();
                //hide the messages
	            hide_messages('#messages');
        	} 
        	if (data === 'user does not exists.') {
        		$('#messages').show();
	            $('#messages').removeClass();
	            $('#messages').addClass('alert alert-danger');
	            $('#messages').html('User already exists. Please select a new one.');
                //reset the form
                $('#create-admin-form')[0].reset();

                //hide the messages
	            hide_messages('#messages');
        	}
        });
	});
});
