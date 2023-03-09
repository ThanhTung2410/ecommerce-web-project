<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Manufacturer Management</title>
	<!-- Bootstrap -->
	<?php require_once "../../bootstrap.php" ?>
	<!-- JQuery -->
	<?php require_once "../../jquery.php" ?>
	<!-- font-awesome -->
	<?php require_once "../../font_awesome.php" ?>
	<!-- Custom -->
	<link rel="stylesheet" href="../../css/style_sidebar.css">
</head>

<?php
require_once "../../connect.php";
$sql = "SELECT * FROM manufacturer";
$result = $conn->query($sql);
?>

<body style="background-color: lightgray;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.php" ?>
			</div>
			<div class="col-10">
				<div class="d-flex justify-content-between align-items-center bg-white mt-3">
					<p class="ms-4 mb-0">Website</p>
					<div class="d-flex align-items-center me-4 my-1">
						<img class="rounded-circle me-2" src="../../img/avatar/sample.jpg" alt="Avatar" style="height: 50px;">
						<div>
							<h6 class="m-0">John Doe</h6>
							<p class="m-0 fs-6">Admin</p>
						</div>
					</div>
				</div>


				<div class="d-flex justify-content-between mt-3">
					<h4>Manage Manufacturer</h4>
					<a class="btn btn-primary" href="form_insert.php">Add Product</a>
				</div>

				<table class="w-100 mt-3 table table-striped ">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Logo</th>
					</tr>
					<?php foreach ($result as $row) { ?>
						<tr>
							<td><?= $row['id'] ?></td>
							<td><?= $row['name'] ?></td>
							<td>
								<img height="100" src="<?= $row['imgPath'] ?>" alt="">
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<?php $conn->close(); ?>
</body>

</html>