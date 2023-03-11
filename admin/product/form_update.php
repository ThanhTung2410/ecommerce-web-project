<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Product Management</title>
	<!-- Bootstrap -->
	<?php require_once "../../bootstrap5.html" ?>
	<!-- JQuery -->
	<?php require_once "../../jquery.html" ?>
	<!-- font-awesome -->
	<?php require_once "../../font_awesome.html" ?>
	<!-- Custom -->
	<link rel="stylesheet" href="../../css/style_sidebar.css">
</head>

<?php
if (empty($_GET['id'])) {
	$_SESSION['errorMsg'] = "Please send ID of product";
	header('location: index.php');
	exit;
}

$id = $_GET['id'];

require_once "../../connect.php";
$sql = "SELECT *  FROM product WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("i", $id);
if (!$stm->execute()) {
	die($stm->error);
}
$result = $stm->get_result();
$row = $result->fetch_assoc();
?>

<body style="background-color: lightgray;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
				<?php require_once "../account_box.html" ?>
				<div class="w-25 mt-3">
					<h3>Update Product</h3>
					<form method="post" action="update.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $id ?>">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
						</div>
						<div class="mb-3">
							<label for="price" class="form-label">Price</label>
							<input type="number" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Description</label>
							<textarea class="form-control" name="description" id="description" cols="20" rows="5"><?= $row['description'] ?></textarea>
						</div>
						<div class="mb-3">
							<label for="img" class="form-label">Update new image of productr</label>
							<input type="file" class="form-control" id="img" name="new_img">

						</div>
						<div>
							<input type="hidden" name="old_img_path" value="<?= $row['imgPath'] ?>">
							<label class="form-label">Or keep old image</label>
							<img height="100" src="<?= $row['imgPath'] ?>" alt="">
						</div>
						<div class="mb-3">
							<label for="" class="form-label">Manufacturer</label>
							<select name="manufacturer_id" id="">
								<?php $sql = "SELECT *  FROM manufacturer";
								$manufacturers = $conn->query($sql);
								foreach ($manufacturers as $manufacturer) { ?>
									<option value="<?= $manufacturer['id'] ?>" <?php if ($row['manufacturer_id'] == $manufacturer['id']) {
																					echo "selected";
																				} ?>><?= $manufacturer['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
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
	</div>
	<script>
		setTimeout(function() {
			$('.alert-danger').alert('close');
		}, 2000);
	</script>
</body>

</html>