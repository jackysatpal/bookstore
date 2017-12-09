<?php
	/*
		all functions related to php
	*/

	//encode url parameters
		function url_encode($string="") {
			return urlencode($string);
		}

	//encode html characters
		function html_encode($string="") {
			return htmlspecialchars($string);
		}

	//url redirect
		function redirect_to($url) {
			header("Location: " . $url);
			exit;
		}

	//to check if its HTTP get method
		function is_get_method() {
			return $_SERVER['REQUEST_METHOD'] === 'GET';
		}
		
	//check if its HTTP post method
		function is_post_method() {
			return $_SERVER['REQUEST_METHOD'] === 'POST';
		}
