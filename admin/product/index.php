<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Product Management</title>
	<!-- Bootstrap -->
	<?php require_once "../../bootstrap.html" ?>
	<!-- JQuery -->
	<?php require_once "../../jquery.html" ?>
	<!-- font-awesome -->
	<?php require_once "../../font_awesome.html" ?>
	<!-- Custom -->
	<link rel="stylesheet" href="../../css/style_sidebar.css">
</head>

<?php
require_once "../../connect.php";
$sql = "SELECT product.*, manufacturer.name as manufacturer_name FROM product INNER JOIN manufacturer on product.manufacturer_id = manufacturer.id";
$result = $conn->query($sql);
?>

<body style="background-color: lightgray;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
				<?php require_once "../account_box.html" ?>

				<div class="d-flex justify-content-between mt-3">
					<h4>Manage Product</h4>
					<a class="btn btn-primary" href="form_insert.php">Add Product</a>
				</div>

				<table class="w-100 mt-3 table table-striped ">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>Manufacturer</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
					<?php foreach ($result as $row) { ?>
						<tr>
							<td><?= $row['id'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['price'] ?></td>
							<td><?= $row['manufacturer_name'] ?></td>
							<td>
								<img height="100" src="<?= $row['imgPath'] ?>" alt="">
							</td>
							<td>
							<a href="view_detail?id=<?= $row['id'] ?>" style="text-decoration: none;"><button class="btn btn-sm btn-success">
										View
									</button>
								</a>
								<a href="form_update.php?id=<?= $row['id'] ?>" style="text-decoration: none;"><button class="btn btn-sm btn-primary">
										Update
									</button>
								</a>
								<a href="delete.php?id=<?= $row['id'] ?>" style="text-decoration: none;">
									<button class="btn btn-sm btn-danger">Delete</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php
					if (isset($_SESSION['errorMsg'])) { ?>
						<div class="alert alert-danger mt-3">
							<a href="#" class="close"></a>
							<strong>Error!</strong> <?= $_SESSION['errorMsg'] ?>
						</div>
				</div>
			<?php unset($_SESSION['errorMsg']);
					} ?>
			</div>
		</div>
	</div>
	<?php $conn->close(); ?>
	<script>
		setTimeout(function() {
			$('.alert-danger').alert('close');
		}, 2000)
	</script>
</body>

</html>