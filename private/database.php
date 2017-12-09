<?php
    /*
        all functions related to database
    */
    //require database credentials
        require_once('db_credentials.php');
    
    function db_connect() {
        try {
		    $connection = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
		    // set the PDO instance error mode to exception
		    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
		catch (PDOException $e) {
            die("Database connection failed " . $e->getMessage());
	    }
	    //return the database connection
	    return $connection;
    }

    function db_disconnect($connection) {
        if(isset($connection)) {
            $connection = null;
        }
    }

    function confirm_result_set($result_set) {
    	if(empty($result_set)) {
    		die("No such record exists");
    	}
    }
