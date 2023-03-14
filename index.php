<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- In Bootstrap 4, include jQuery first, then a Bootstrap JavaScript bundle -->
	<!-- JQuery -->
	<?php require_once "jquery.html" ?>
	<!-- Bootstrap -->
	<?php require_once "bootstrap4.html" ?>
	<!-- font-awesome -->
	<?php require_once "font_awesome.html" ?>
	<!--  -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Custom -->
	<link rel="stylesheet" href="css/style_card.css">
</head>

<?php
require_once "connect.php";
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">
				<i class="fa fa-cube"></i>Shopee</b>
			</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
				<div class="navbar-nav">
					<a href="#" class="nav-item nav-link active text-uppercase">Home</a>
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown">Danh mục</a>
						<div class="dropdown-menu d-inline-bloack">
							<a href="#" class="dropdown-item nav-item">Thời trang nam</a>
							<a href="#" class="dropdown-item nav-item">Thời trang nữ</a>
							<a href="#" class="dropdown-item nav-item">Thiết bị điện tử</a>
							<a href="#" class="dropdown-item nav-item">Đồng hồ</a>
						</div>
					</div>
				</div>

				<div class="d-flex ml-auto">
					<form class="navbar-form form-inline">
						<input type="text" id="search" class="form-control" placeholder="Tìm: tên sản phẩm">
					</form>

					<div class="navbar-nav ml-2">
						<!-- When user logins -->
						<?php if (isset($_SESSION['id'])) { ?>
							<div class="nav-item dropdown">
								<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img class="rounded-circle" style="height: 50px;" src="<?php if (is_null($_SESSION['avatar'])) {
																																											echo "img/avatar/sample.jpg";
																																										} else {
																																											echo $_SESSION['avatar'];
																																										} ?>" class="avatar" alt="Avatar"><b class="caret"></b></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
									<a href="#" class="dropdown-item"><i class="fa fa-sliders mr-1"></i> Settings</a>
									<div class="dropdown-divider"></div>
									<a href="logout.php" class="dropdown-item d-flex"><i class="material-icons mr-1">&#xE8AC;</i> Logout</a>
								</div>
							</div>
							<!-- End When user logins  -->
						<?php } else { ?>
							<!-- When user doesn't login -->
							<div class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i></a>
								<div class="dropdown-menu d-inline-bloack">
									<a href="#" class="dropdown-item nav-item" id="login-btn" data-target="#loginModal" data-toggle="modal">Đăng nhập</a>
									<a href="#" class="dropdown-item nav-item" id="sign-up-btn" data-target="#signUpModal" data-toggle="modal">Đăng ký</a>
								</div>
							</div>



							<!-- Login modal -->
							<div class="modal fade" id="loginModal">
								<div class="modal-dialog ">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Đăng nhập</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
											<form action="login.php" method="post">
												<div class="form-group">
													<label for="email">Email:</label>
													<input type="email" class="form-control" placeholder="Enter email" id="email" required name="email">
												</div>
												<div class="form-group">
													<label for="pwd">Password:</label>
													<input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="password">
												</div>
												<div class="form-group custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
													<label class="custom-control-label" for="remember_me">Remember
														me</label>
												</div>
												<button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
											</form>
										</div>

										<!-- Modal footer -->
										<div class="modal-footer" style="justify-content: center;">
											Not a member yet?<a href="#">Sign Up</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Login modal -->

							<!-- Sign up modal -->
							<div class="modal fade" id="signUpModal">
								<div class="modal-dialog ">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-title">Đăng ký</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal body -->
										<div class="modal-body">
											<form action="sign_up.php" method="post" class="needs-validation" novalidate>
												<div class="form-group">
													<label for="name">Name:</label>
													<input type="text" class="form-control" placeholder="Enter name" id="name" required name="name">
													<div class="invalid-feedback">
														Please enter your name
													</div>
												</div>
												<div class="form-group">
													<label for="email">Email:</label>
													<input type="email" class="form-control" placeholder="Enter email" id="email" required name="email">
													<div class="invalid-feedback">
														Please enter your email
													</div>
												</div>
												<div class="form-group">
													<label for="pwd">Password:</label>
													<input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="password">
													<div class="invalid-feedback">
														Please enter your password
													</div>
												</div>
												<button type="submit" class="btn btn-primary w-100">Đăng ký</button>
											</form>
										</div>

										<!-- Modal footer -->
										<div class="modal-footer" style="justify-content: center;">
											Are you a member?<a href="#">Login</a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Sign up modal -->

						<?php } ?>
						<!-- End When user doesn't login -->
					</div>

				</div>
			</div>
		</div>
	</nav>

	<!-- End: Navbar -->

	<div class="container">
		<div class="row">
			<div class="col-9 mt-4">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="img/banner/vn-50009109-a720785101836d775b0d73c067466489_xxhdpi.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="img/banner/vn-50009109-a720785101836d775b0d73c067466489_xxhdpi.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="img/banner/vn-50009109-a720785101836d775b0d73c067466489_xxhdpi.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-3 mt-4 pl-0">
				<img class="d-block w-100 h-50 py-1" src="img/banner/vn-50009109-a720785101836d775b0d73c067466489_xxhdpi.jpg" alt="Third slide">
				<img class="d-block w-100 h-50 pt-1" src="img/banner/vn-50009109-a720785101836d775b0d73c067466489_xxhdpi.jpg" alt="Third slide">
			</div>
		</div>
		<div class="row">
			<?php foreach ($result as $record) { ?>
				<div class="col-2 mt-4">
					<div class="card h-100">
						<img class="card-img-top" src="<?= substr($record['imgPath'], 6); ?>" alt="<?= $record['name'] ?>" />
						<div class="card-body">
							<h5 class="card-title text-primary text-truncate"><?= $record['name'] ?></h5>
							<h6 class="card-text">$<?= $record['price'] ?></h6>
							<button class="btn btn-primary">Add to cart</button>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<!-- Footer -->
	<footer class="bg-dark text-center text-white mt-3">

		<div class="container">

		</div>

		<!-- Copyright -->
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2023 Copyright:
			<a class="text-white" href="">Shopee</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- End Footer -->

	<script>
		$(document).ready(function() {
			$('#loginModal .modal-footer a').click(function(event) {
				$('#loginModal').modal('hide')
				$('#signUpModal').modal('show');
			})

			$('#signUpModal .modal-footer a').click(function(event) {
				$('#loginModal').modal('show')
				$('#signUpModal').modal('hide');
			})


			// Get the forms we want to add validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});

		})
	</script>
</body>

</html>