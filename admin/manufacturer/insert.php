<?php
session_start();

if (empty($_POST['name']) && $_FILES['img']['error']) {
	$_SESSION['errorMsg'] = "Invalid please submit again with valid information";
	header("location: form_insert.php");
	exit;
}

$name = $_POST['name'];

require_once "../handle_single_file.php";

$uploaded_file = $_FILES['img'];
$max_file_size = 2 * 1024 * 1024;
$accepted_extensions = array('png', 'jpg');
$dir = "../../img/manufacturer_logo/";
$locationToRedirect = "form_insert.php";
$path = handle_uploaded_file($uploaded_file, $max_file_size, $accepted_extensions, $dir, $locationToRedirect);

require_once "../../connect.php";
$sql = "INSERT INTO Manufacturer(name, imgPath) VALUES(?, ?)";
$stm = $conn->prepare($sql);
$stm->bind_param("ss", $name, $path);
if (!$stm->execute()) {
	die($stm->error);
}

$conn->close();
header("location: index.php");
