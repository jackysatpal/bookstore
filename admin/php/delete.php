<?php
	require_once('../../private/initialise.php');

	if(isset($_POST['action']) && !empty($_POST['action'])) {
        $admin_id = $_POST['admin_id'];

		if(delete_admin_record($admin_id)) {
			echo 'Record Deleted'; 	
		}
    }