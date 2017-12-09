<?php
	require_once('../../private/initialise.php');

	if (isset($_POST['action']) && !empty($_POST['action'])) {
        
        $result = find_all_active_admin_records();

        if(empty($result)) {
            echo 'no results';
        } else {
            //$result = find_all_active_admin_records();
            foreach($result as $row) {
            ?>
            <!--display records in the table-->
            <tr>
                <td>
                    <?php echo $row->admin_name; ?>
                </td>

                <td>
                    <?php echo $row->is_admin; ?> 
                </td>
                
                <td>
                    <!--delete button-->
                    <button class="delete btn btn-danger btn-sm" data-admin-id="<?php echo $row->admin_id; ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    <!--edit button-->
                    <button class="edit btn btn-default btn-sm" data-admin-id="<?php echo $row->admin_id; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </td>

            </tr>
            <?php
            }
        }
    }
	
