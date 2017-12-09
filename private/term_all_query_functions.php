<?php
    
    


    /*All functionality related to term*/
    function update_term($termid, $status) {
        global $db_connection;
        $update_query = "UPDATE term SET status = ? where term_id = ?";
        try {
            $statement = $db_connection->prepare($update_query);
            $statement->bindParam(1, $status, PDO::PARAM_STR);
            $statement->bindParam(2, $termid, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database update query failed for update_term() in query_function.php file " . $e->getMessage());
        }
        return true;
    }

    function delete_term($termid) {
        global $db_connection;
        $delete_query = "UPDATE term SET active = 0 where term_id = ?";
        try {
            $statement = $db_connection->prepare($delete_query);
            $statement->bindParam(1, $termid, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database delete query failed for delete_term() in query_function.php file " . $e->getMessage());
        }
        return true;
    }

    function check_if_term_code_id_exists($term_code_id) {
        global $db_connection;
        $select_query = "SELECT term_code_id FROM `term code` WHERE term_code_id = ?";
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->bindParam(1, $term_code_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database select query failed " . $e->getMessage());
        }
        $result = $statement->fetchALL(PDO::FETCH_OBJ);
        //confirm_result_set($result);
        return $result;
    }

    function find_all_active_terms() {
        global $db_connection;
        $select_query = "SELECT term FROM term WHERE active = 1 AND status = 'on'";
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database select query failed " . $e->getMessage());
        }
        $result = $statement->fetchALL(PDO::FETCH_OBJ);
        //confirm_result_set($result);
        return $result;
    }

    function find_all_active_terms_with_term_description() {
        global $db_connection;
        $select_query = "SELECT
                          t.status,
                          t.term,
                          t.term_id,
                          tc.term_code_description
                        FROM
                          `term` AS t
                        INNER JOIN
                          `term code` AS tc
                        ON
                          t.term_code_id = tc.term_code_id
                        WHERE
                          t.active = 1";
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database select query failed " . $e->getMessage());
        }
        $result = $statement->fetchALL(PDO::FETCH_OBJ);
        //confirm_result_set($result);
        return $result;
    }

    function insert_term($term, $term_code_id) {
        global $db_connection;
        $insert_query = "INSERT INTO term (term, term_code_id) VALUES (?, ?)";
        try {
            $statement = $db_connection->prepare($insert_query);
            $statement->bindParam(1, $term, PDO::PARAM_STR);
            $statement->bindParam(2, $term_code_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database insert query failed for insert_term() in query_function.php file " . $e->getMessage());
        }
        return true;
    }

    function reactive_term($term_id) {
        global $db_connection;
        $update_query = "UPDATE term SET active = 1 WHERE term_id = ?";
        try {
            $statement = $db_connection->prepare($update_query);
            $statement->bindParam(1, $term_id, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database update query failed for update_term() in query_function.php file " . $e->getMessage());
        }
        return true;
    }

    function find_term_and_insert ($term, $term_code_id) {
        global $db_connection;
        $select_query = "SELECT term_id, term FROM term WHERE term = ?";
        try {
            $statement = $db_connection->prepare($select_query);
            $statement->bindParam(1, $term, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $e) {
            die("Database select query failed " . $e->getMessage());
        }
        $result = $statement->fetch();
        if(empty($result)) {
           return insert_term($term, $term_code_id);
        } else {
            $new_select_query = "SELECT term_id, term FROM term WHERE active = 0 AND term = ?";
            try {
                $new_statement = $db_connection->prepare($new_select_query);
                $new_statement->bindParam(1, $term, PDO::PARAM_STR);
                $new_statement->execute();
            }
            catch(PDOException $e) {
                die("Database select query failed " . $e->getMessage());       
            }
            $new_result = $new_statement->fetch();
            if(!empty($new_result)) {
                return reactive_term($new_result['term_id']);
            } else {
                return false;
            }
        }
    }