<?php session_start() ?>

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

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.php" ?>
			</div>
			<div class="col-10">
				<div class="w-25">
					<h3>Insert Manufacturer</h3>
					<form method="post" action="insert.php" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="mb-3">
							<label for="img" class="form-label">Logo of manufacturer</label>
							<input type="file" class="form-control" id="img" name="img">
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