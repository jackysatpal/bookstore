<?php 
	require_once('../../private/initialise.php');

	if (isset($_POST['action']) && !empty($_POST['action'])) {
		$admin_name = $_POST['admin_name'];
		$is_admin = $_POST['is_admin'];

		if (find_admin_by_admin_name ($admin_name, $is_admin) ) {
			echo 'new user';
		} else {
			echo 'user does not exists.';
		}
	}

	