<?php
	if(!isset($page_title)) {
		$page_title = 'Admin Details';
	}
 ?>

<title><?php echo $page_title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	#content {
		margin-top: 50px;
	}
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  margin-bottom: 40px; /* Margin bottom by footer height */
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  height: 40px; /* Set the fixed height of the footer here */
	  background-color: #f5f5f5;
	}
</style>