<?php
	require_once('../../private/initialise.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<!--head-->
			<?php $page_title='Admin Create'; ?>
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
					<form id="create-admin-form">
						<p id="messages"></p>
						<!--form elements--> <!-- !! you shouldn't lose indentation -->
		                <div class="form-group">
		                	<!--input name-->
		                    <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Add Username" required autofocus>
		                    <br> <!-- always close tags no matter what -->
		                    Admin 
		                    <input type="checkbox" name="is_admin" id="is_admin" autofocus><br>
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

		<!--jquery js CDN link--> <!-- !! We typically include js in the header -->
			<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  		crossorigin="anonymous"></script>
		  	<!--bootstrap js CDN link -->
		 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		    <!--create.js-->
	    	<script src="../js/create.js"></script> <!-- I always create an endpoint for my scripts even within my app. Avoids this relative stuff -->
	    <!--js scripts ends-->

		<!--footer-->
		<?php 
			include(SHARED_PATH . '/footer.php') // I see this as more of a client side 
		?>
		<!--footer ends-->

	</body>
</html>
