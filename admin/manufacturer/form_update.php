<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Manufacturer Management</title>
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
	$_SESSION['errorMsg'] = "Please send ID of manufacturer";
	header('location: index.php');
	exit;
}


$id = $_GET['id'];

require_once "../../connect.php";
$sql = "SELECT * FROM manufacturer WHERE id = ?";
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
					<h3>Update Manufacturer</h3>
					<form method="post" action="update.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $id ?>">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
						</div>
						<div class="mb-3">
							<label for="img" class="form-label">Update new logo of manufacturer</label>
							<input type="file" class="form-control" id="img" name="new_img">

						</div>
						<div>
							<input type="hidden" name="old_img_path" value="<?= $row['imgPath'] ?>">
							<label class="form-label">Or keep old logo</label>
							<img height="100" src="<?= $row['imgPath'] ?>" alt="">
						</div>
						<div>

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