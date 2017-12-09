<?php
    /*
        all files are imported in a single file
    */

	ob_start();//start output buffering

	//file path configuration constants
        DEFINE("PRIVATE_PATH", __DIR__);
        DEFINE("SHARED_PATH", __DIR__ . '\shared');
        DEFINE("PROJECT_PATH", dirname(PRIVATE_PATH));

    //required files
        require_once('db_credentials.php');
        require_once('database.php');
        require_once('functions.php');
        require_once('admin_all_query_functions.php');
        require_once('term_all_query_functions.php');
        require_once('validation_functions.php');

    //start database connection
        $db_connection = db_connect();
    
   