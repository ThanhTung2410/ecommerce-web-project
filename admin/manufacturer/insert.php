<?php
session_start();

if (empty($_POST['name']) && $_FILES['img']['error']) {
	$_SESSION['errorMsg'] = "Invalid please submit again with valid information";
	header("location: form_insert.php");
	exit;
}

$name = $_POST['name'];

$uploaded_file = $_FILES['img'];
$size = $uploaded_file['size'];
$filename = str_replace("/", "", date("Y/m/d")) . "-" . $uploaded_file['name'];
$file_extension = pathinfo(basename($filename), PATHINFO_EXTENSION);

$max_file_size = 2 * 1024 * 1024;
if ($size > $max_file_size) {
	$_SESSION['errorMsg'] = "The maximum size of file is 5 MB";
	header("location: form_insert.php");
	exit;
}

$accepted_extensions = array('png', 'jpg');
if (!in_array($file_extension, $accepted_extensions)) {
	$_SESSION['errorMsg'] = "The file type is invalid";
	header("location: form_insert.php");
	exit;
}

$path = "../../img/manufacturer_logo/" . $filename;

move_uploaded_file($uploaded_file['tmp_name'], $path);

require_once "../../connect.php";
$sql = "INSERT INTO Manufacturer(name, imgPath) VALUES(?, ?)";
$stm = $conn->prepare($sql);
$stm->bind_param("ss", $name, $path);
if (!$stm->execute()) {
	die($stm->error);
}

$conn->close();
header("location: index.php");
