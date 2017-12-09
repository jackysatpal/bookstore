<?php
	require_once('../../private/initialise.php');
	$result = find_active_admin_record_by_id(html_encode(url_encode($_GET['id'])));
?>

<!DOCTYPE html>
<html>
	<head>
		<!--head-->
			<?php $page_title='Admin Edit'; ?>
			<?php include(SHARED_PATH . '/head.php') ?>
		<!--head ends-->
	</head>
	<body>
		<!--navigation-->
			<?php include(SHARED_PATH . '/navigation.php') ?>
		<!--navigation ends-->

		<!--heading-->
			<?php include(SHARED_PATH . '/heading.php') ?>
		<!--heading ends-->

		<!--content-->
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<form id="update-admin-form">
							<p id="messages"></p>
							<!--form elements-->
			                <div class="form-group">
			                	<!--display admin_name-->
			                    <input type="text" name="admin_name" id="admin_name" class="form-control" value="<?php echo $result['admin_name']; ?>" autofocus readonly>
			                    <br>
			                    Admin 
			                    <!--is_admin checkbox-->
			                    <input type="checkbox" name="is_admin" id="is_admin" data-admin-id="<?php echo $result['admin_id']; ?>" <?php echo ($result['is_admin'] === 'yes') ? 'checked' : '' ; ?> autofocus><br>
			                </div>
			                <!--submit button-->
			                <div class="form-group">
			                    <input type="submit" class="btn btn-primary" value="submit">
			                </div>
		            	</form>
					</div>
				</div>
			</div>
		<!--content ends-->

		<!--js scripts-->
			<!--jquery js CDN link-->
			<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  		crossorigin="anonymous"></script>
		  	<!--bootstrap js CDN link -->
		 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		    <!--update.js-->
		    <script src="../js/update.js"> </script>
		<!--js scripts ends-->

		<!--footer-->
			<?php 
				include(SHARED_PATH . '/footer.php') 
			?>
		<!--footer ends-->
	</body>
</html>