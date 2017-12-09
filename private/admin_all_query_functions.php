<?php
    
    function create_admin ($admin_name, $is_admin) {
        global $db_connection;
        $insert_query = "INSERT INTO admin (admin_name, is_admin) VALUES (?, ?)";
        
        try {
            $statement = $db_connection->prepare($insert_query);
            $statement->bindParam(1, $admin_name, PDO::PARAM_STR);
            $statement->bindParam(2, $is_admin, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed for create_admin () in query_function.php file " . $e->getMessage());
        }

        return true;
    }
    
    function delete_admin_record ($admin_id) {
        global $db_connection;
        $delete_query = "UPDATE admin SET is_active = 0 where admin_id = ?";
        
        try {
            $statement = $db_connection->prepare($delete_query);
            $statement->bindParam(1, $admin_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed for delete_admin() in admin_all_query_functions.php file " . $e->getMessage());
        }

        return true;
    }

    function find_active_admin_record_by_id ($id) {
        global $db_connection;
        $select_query = "SELECT admin_id, admin_name, is_admin FROM admin WHERE is_active = 1 AND admin_id = ?";
        
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->bindParam(1, $id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database select query failed " . $e->getMessage());
        }

        $result = $statement->fetch();
        confirm_result_set($result);
        return $result;
    }

	function find_all_active_admin_records () {
        global $db_connection;
        $select_query = "SELECT admin_id, admin_name, is_admin FROM admin WHERE is_active = 1;";
        
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed " . $e->getMessage());
        }

        $result = $statement->fetchALL(PDO::FETCH_OBJ);
        return $result;
    }

    function find_admin_by_admin_name ($admin_name, $is_admin) {
        global $db_connection;
        $select_query = "SELECT admin_id, admin_name FROM admin WHERE admin_name = ?";
        
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->bindParam(1, $admin_name, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed " . $e->getMessage());
        }

        $result = $statement->fetch();
        
        if(empty($result)) {
           return create_admin ($admin_name, $is_admin);//insert if user is new
        } else {
            $new_select_query = "SELECT admin_id, admin_name FROM admin WHERE is_active = 0 AND admin_name = ?";
            
            try {
                $new_statement = $db_connection->prepare($new_select_query);
                $new_statement->bindParam(1, $admin_name, PDO::PARAM_STR);
                $new_statement->execute();
            }
            catch(PDOException $e) {
                die("Database query failed " . $e->getMessage());       
            }
            
            $new_result = $new_statement->fetch();
            
            if(!empty($new_result)) {
                return reactivate_admin ($new_result['admin_id']);
            } else {
                return false;
            }
        }
    }

    function reactivate_admin ($admin_id) {
        global $db_connection;
        $update_query = "UPDATE admin SET is_active = 1 WHERE admin_id = ?";
        
        try {
            $statement = $db_connection->prepare($update_query);
            $statement->bindParam(1, $admin_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed for reactivate_admin () in query_function.php file " . $e->getMessage());
        }

        return true;
    }

    function update_admin_record ($admin_id, $is_admin) {
        global $db_connection;
        $update_query = "UPDATE admin SET is_admin = ? where admin_id = ?";
        
        try {
            $statement = $db_connection->prepare($update_query);
            $statement->bindParam(1, $is_admin, PDO::PARAM_STR);
            $statement->bindParam(2, $admin_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database query failed for update_admin_record () in query_function.php file " . $e->getMessage());
        }

        return true;
    }