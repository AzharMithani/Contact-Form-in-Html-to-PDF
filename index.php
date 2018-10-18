<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Azhar PDF</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Convert HTML To PDF</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add member</button>
		<a href="export.php" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-export"></span> Export As PDF</a>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Firstname</th>
					<th>Middlename</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Civil Status</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'conn.php';
					$query = $conn->query('SELECT * FROM `member` ORDER BY `lastname` ASC') or die($conn->error());
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['firstname']?></td>
					<td><?php echo $fetch['middlename']?></td>
					<td><?php echo $fetch['lastname']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['civil_status']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="save_form.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" require="required"/>
							</div>
							<div class="form-group">
								<label>Middlename</label>
								<input type="text" name="middlename" class="form-control" require="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" require="required"/>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" require="required"/>
							</div>
							<div class="form-group">
								<label>Civil Status</label>
								<input type="text" name="civil_status" class="form-control" require="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>