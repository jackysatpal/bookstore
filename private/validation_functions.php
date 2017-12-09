<?php
	
	function is_blank($value) {
		return !isset($value) || trim($value) === '';
	}

	function has_presence($value) {
		return !is_blank($value);
	}

	function has_length_less_than($value, $min) {
		$length = strlen($value);
		return $length < $min;
	}

	function has_valid_email_format($value) {
    	$email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    	return preg_match($email_regex, $value) === 1;
  	}

