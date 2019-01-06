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
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div id="message"></div>
				<div class="panel panel-primary">
					<div class="panel-heading">Add New Order</div>
					<div class="panel-body">
						<form action="controller.php" method="post" id="saveOrder" enctype="multipart/form-data">
							<input type="hidden" name="saveOrder" id="saveOrder" value="saveOrder">
							<input type="hidden" name="order_id" class="order_id">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select name="category" id="category" placeholder="Select Category category_name" class="form-control">
											<option>Select Category</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select name="product" id="product" class="form-control product_name">
											<option>Select Product</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group"><input type="text" name="price" placeholder="Enter Price" id="price" class="form-control price"></div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div id="image"></div>
										<input type="hidden" name="path" class="photo">
										<input type="file" name="photo" id="photo" class="form-control"></div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<a href="" id="cancel" class="btn btn-default pull-left">Cancel</a>
											<input type="submit"  value="Save Product" class="btn btn-primary order pull-right"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Data Table  -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<table class="table table-bordered" id="table">
					</table>
				</div>
			</div>
		</div>
	</body>
	</html>

