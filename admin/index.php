<?php
	require_once('../private/initialise.php'); // "initialize" is how most people would spell it.
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- 
                     !! These comments are absolutely useless. There are times when commenting actually helps.
                     Rest of the time, its distracting and reduces readability of code. Please remove.
                -->
		<!--head-->
			<!--page title-->
				<?php $page_title='Admin Details'; ?> <!-- !! Uneven spacing -->
			<?php include(SHARED_PATH . '/head.php') ?>
		<!--head ends -->
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
				<div class="col-md-6">
					<p id="messages"></p>
					<table class="table" id="table">
						<thead>
							<tr>
								<th>Username</th>
								<th>Admin</th>
								<th>Action</th>
							</tr>
						</thead>
						<!-- 
                                                    !! You don't need an ID for this. Use IDs only when you absolutely need them. They need DOM indexing and slow things down.
                                                -->
						<tbody id="data">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--content ends-->

		<!--js scripts -->
			<!--jquery js CDN link-->
				<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  		crossorigin="anonymous"></script>
		  	<!--bootstrap js CDN link-->
		 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		 	<!--index-->
		    	<script src="js/index.js"></script> <!-- !! Uneven spacing here too. As a rule, always prefer spaces over tabs. Tabs are terrible -->
		<!--js scripts ends -->

		<!--footer-->
			<?php 
	                        /* Never comment code, if you don't want it, remove it. */
				//db_disconnect($db_connection);
				include(SHARED_PATH . '/footer.php') 
			?>
		<!--footer ends-->

	</body>
</html>
