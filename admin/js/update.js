$(document).ready(function() {

	//setTimeout function to hide the messages
    function hide_messages(DOM_element) {
        var DOM_element = DOM_element;
        setTimeout(function() {
            $(DOM_element).fadeOut('slow');
        }, 3000);
    }

    //update admin form submit 
    $('#update-admin-form').submit(function(event) {
    	event.preventDefault();
    	var is_admin = $('#is_admin').is(":checked") ? 'yes' : 'no';
    	var admin_id = $('#is_admin').data('admin-id');

    	update_admin_record (admin_id, is_admin);
    });

    function update_admin_record (admin_id, is_admin) {
    	var admin_id = admin_id;
    	var is_admin = is_admin;
    	var action = 'update';
    	
    	var ajaxCall = $.ajax({
    		url: 'update.php',
            type: 'POST',
            data: { action: action, admin_id: admin_id, is_admin: is_admin }
    	});

    	ajaxCall.done(function(responseData) {
    		if(responseData === 'Record Updated') {
                $('#messages').show();
                $('#messages').removeClass();
                $('#messages').addClass('alert alert-success');
                $('#messages').text(responseData);
                
                //hide the messages
                hide_messages ('#messages');
            }
    	});
    }    
});