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

						<!-- <a href="#" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span
								class="badge">1</span></a>
						<div class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src=""
									class="avatar" alt="Avatar"><b class="caret"></b></a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
								<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
							</div>
						</div> -->

						<!-- End When user logins  -->

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
										<form action="" method="post">
											<div class="form-group">
												<label for="email">Email:</label>
												<input type="email" class="form-control" placeholder="Enter email" id="email" required>
											</div>
											<div class="form-group">
												<label for="pwd">Password:</label>
												<input type="password" class="form-control" placeholder="Enter password" id="pwd" required>
											</div>
											<div class="form-group custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
												<label class="custom-control-label" for="customCheck">Remember
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
										<form action="" method="post" class="needs-validation" novalidate>
											<div class="form-group">
												<label for="username">Username:</label>
												<input type="text" class="form-control" placeholder="Enter username" id="username" required>
												<div class="invalid-feedback">
													Please enter your username
												</div>
											</div>
											<div class="form-group">
												<label for="email">Email:</label>
												<input type="email" class="form-control" placeholder="Enter email" id="email" required>
												<div class="invalid-feedback">
													Please enter your email
												</div>
											</div>
											<div class="form-group">
												<label for="pwd">Password:</label>
												<input type="password" class="form-control" placeholder="Enter password" id="pwd" required>
												<div class="invalid-feedback">
													Please enter your password
												</div>
											</div>
											<button type="submit" class="btn btn-primary w-100">Đăng ký</button>
										</form>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer" style="justify-content: center;">
										Are you a member?<a href="#">Sign in</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Sign up modal -->

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
</body>

</html>