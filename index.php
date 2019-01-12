<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Provab | Demo</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jscript.php"></script>
	<style>
		td{ vertical-align: middle !important; padding: 1px 0 0 5px !important }
	</style>
</head>
<body>
	<?php 
		session_start();
		if (!empty($_SESSION['user_id'])) {
			header('Location:dashboard.php');
		}
	?>
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div id="message"></div>
				<div class="panel panel-primary">
					<div class="panel-heading">Fill your login  details</div>
					<div class="panel-body">
						<form action="controller.php" method="post" id="loginForm">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group"><input type="text" name="username" placeholder="User Name" id="username" class="form-control">
										<div class="user_error"></div>
									</div>
									
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" name="password" placeholder="Password" id="password" class="form-control">
									<div class="pass_error"></div>
									</div>
										
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit"  value="Login" name="login" class="btn btn-primary  pull-right"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
	</html>

