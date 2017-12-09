<?php
	require_once('../../private/initialise.php');

	if(isset($_POST['action']) && !empty($_POST['action'])) {
        $admin_id = $_POST['admin_id'];
        $is_admin = $_POST['is_admin'];

		if(update_admin_record ($admin_id, $is_admin)) {
			echo 'Record Updated'; 	
		} 
    } 