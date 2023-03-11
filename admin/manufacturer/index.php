<?php session_start(); ?>
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
require_once "../../connect.php";
// Search
$searchContent = "";
if (isset($_GET['searchContent'])) {
	$searchContent = $_GET['searchContent'];
}

// Pagination
$numberOfManufacturerEachPage = 3;
$sql = "SELECT * FROM Manufacturer WHERE name like '%$searchContent%'";
$numberOfManufacturer = $conn->query($sql)->num_rows;
$numberOfPage = ceil($numberOfManufacturer / $numberOfManufacturerEachPage);
$currentPage = 1;
if (isset($_GET['currentPage'])) {
	$currentPage = $_GET['currentPage'];
}

$numberOfOffsetManufacturer = ($currentPage - 1) * $numberOfManufacturerEachPage;

$sql = "SELECT * FROM manufacturer WHERE name like '%$searchContent%' LIMIT $numberOfManufacturerEachPage OFFSET $numberOfOffsetManufacturer";
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
					<h4>Manage Manufacturer</h4>
					<form action="" method="">
						<div class="d-flex">
							<input placeholder="Search by name of product" class="form-control" type="search" name="searchContent" id="" value="<?= $searchContent ?>">
							<button class="btn"><i class="fas fa-search fs-4"></i></button>
						</div>
					</form>
					<a class="btn btn-primary" href="form_insert.php">Add Manufacturer</a>
				</div>

				<table class="w-100 mt-3 table table-striped ">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Logo</th>
						<th>Action</th>
					</tr>
					<?php foreach ($result as $row) { ?>
						<tr>
							<td><?= $row['id'] ?></td>
							<td><?= $row['name'] ?></td>
							<td>
								<img height="100" src="<?= $row['imgPath'] ?>" alt="">
							</td>
							<td>
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
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link <?php if ($currentPage == 1) {
													echo "disabled";
												} ?> " href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $numberOfPage; $i++) { ?>
							<li class="page-item"><a class="page-link <?php if ($i == $currentPage) {
																			echo "active";
																		} ?>" href="index.php?currentPage=<?= $i ?>&searchContent=<?= $searchContent ?>"><?= $i ?></a></li>
						<?php } ?>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
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