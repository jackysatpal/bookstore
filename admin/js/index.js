$(document).ready(function() {

    //as soon as DOM is ready, run the display()
	display_admin_records();

	//setTimeout function to hide the messages
    function hide_messages(DOM_element) {
        var DOM_element = DOM_element;
        setTimeout(function() {
            $(DOM_element).fadeOut('slow');
        }, 3000);
    }

	function display_admin_records() {
		var action = 'read';

        var ajaxCall = $.ajax({
            url: 'php/read.php',
            type: 'POST',
            data: { action : action }
        });

        ajaxCall.done(function(responseData) {
            if (responseData === 'no results') {
                $('#table').hide();
                $('#no-results').addClass('alert alert-success');
                $('#no-results').html('Data is empty');
            } else {
                $('#table').show();
                $('#data').html(responseData);

                //event handler for delete button
                $('.delete').on('click', function() {
                    //get the id when user clicks on the delete button
                    var admin_id = $(this).attr('data-admin-id');
                    delete_admin_record(admin_id);
                });

                //event handler for update button
                $('.edit').on('click', function() {
                    //get the id when user clicks on the update button
                	var admin_id = $(this).attr('data-admin-id');
                    //open a new page which user wants to update 
                    window.location = 'php/update_html_form.php?id='+admin_id;
                });
    		}
    	});
	}
	
	//AJAX call to delete an admin
    function delete_admin_record(admin_id) {
        if(confirm("Are you sure you want to delete this?")) {
    		var admin_id = admin_id;
    		var action = 'delete';
            
            var ajaxCall = $.ajax({
                    url: 'php/delete.php',
                    type: 'POST',
                    data: { action: action, admin_id: admin_id }
                });

            ajaxCall.done(function(responseData) {
                if(responseData === 'Record Deleted') {
                    
                    $('#messages').show();
                    $('#messages').removeClass();
                    $('#messages').addClass('alert alert-success');
                    $('#messages').text(responseData);
                    //update the display
                    display_admin_records();
                    //hide the message
                    hide_messages('#messages');
                }
            });
    	}
    	return false;
    }

});